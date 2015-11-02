# Stages
stage { 'first':
  before => Stage['main'],
}


class aptupdate {

  exec { "aptgetupdate":
    path => [ "/bin/", "/sbin/" , "/usr/bin/", "/usr/sbin/", "/usr/local/bin" ],
    command => "apt-get update",
  }

}

class { 'aptupdate':
  stage => first,
}

# Install cURL
package { "curl":
  ensure => installed,
  require => Exec['aptgetupdate'],
}

# PHP
class { 'php::cli': inifile => '/etc/php5/apache2/php.ini', }
class { 'php::mod_php5': inifile => '/etc/php5/apache2/php.ini', php_package_name => 'libapache2-mod-php5'}
php::module { [ 'mcrypt', 'mysql' ]: }

php::ini { '/etc/php5/apache2/php.ini':
  display_errors => 'On',
  memory_limit   => '256M',
  notify => Service["apache2"],
}

# Manually enable mod_php as it doesn't seem to work otherwise
exec { "enablephp5":
  path => [ "/bin/", "/sbin/" , "/usr/bin/", "/usr/sbin/" ],
  command => "a2enmod php5",
  notify => Service["apache2"],
  require => [Class['php::mod_php5'], Class['apache']],
}

# Apache configuration
class { 'apache':
  mpm_module => "prefork",
  default_vhost => false,
  require => Exec['aptgetupdate'],
}

file {'/etc/php5/apache2/':
  ensure => 'directory',
  before => Class['php::cli']
}

# Apache VHost
apache::vhost { 'progress.local':
  port => 80,
  docroot => '/var/www/progress/public',
  override => 'all',
  default_vhost => true,
}

# ModRewrite
class { '::apache::mod::rewrite': }

# Restart Apache
exec { "restartapache":
  path => [ "/bin/", "/sbin/" , "/usr/bin/", "/usr/sbin/" ],
  command => "service apache2 restart",
  require => [Exec['enablephp5'], Class['apache']],
}

# Install MySQL
# Root password should be blank. This is OK since it's a development machine
class { '::mysql::server':
  root_password           => '',
  remove_default_accounts => true,
}

# Setup a Progress database
mysql::db { 'progress':
  user     => 'progress',
  password => 'secret',
  host     => 'localhost',
  grant    => 'ALL',
}

# Set MOTD
file { "/etc/update-motd.d/99-progress":
  ensure => 'present',
  source => '/vagrant/manifests/motd/99-progress',
  mode => '751',
}

# Install Node
package { "nodejs-legacy":
  ensure => 'installed',
  require => Exec['aptgetupdate'],
}

# Install NPM
package { "npm":
  ensure => 'installed',
  require => [Package['nodejs-legacy'], Exec['aptgetupdate']],
}

# Install Git
package { "git":
  ensure => 'installed',
  require => Exec['aptgetupdate'],
}

# Install Bower
exec { "bowerinstall":
  path => [ "/bin/", "/sbin/" , "/usr/bin/", "/usr/sbin/", "/usr/local/bin" ],
  command => "npm install -g bower",
  require => [Package['npm'], Package['git']],
}

# Install Gulp
exec { "gulpinstall":
  path => [ "/bin/", "/sbin/" , "/usr/bin/", "/usr/sbin/", "/usr/local/bin" ],
  command => "npm install -g gulp",
  require => [Package['npm'], Package['git']],
}

# Install Composer
exec { 'install composer':
  command => '/usr/bin/curl -sS https://getcomposer.org/installer | php && sudo mv composer.phar /usr/local/bin/composer',
  require => [Package['curl'], Package['php5-cli']],
}

# Install Bower
exec { "bowercomponentsinstall":
  path => [ "/bin/", "/sbin/" , "/usr/bin/", "/usr/sbin/", "/usr/local/bin" ],
  command => "bower install --allow-root",
  require => [Exec['bowerinstall']],
  cwd => "/var/www/progress",
}

# Install required NPM modules
exec { "modulesinstall":
  path => [ "/bin/", "/sbin/" , "/usr/bin/", "/usr/sbin/", "/usr/local/bin" ],
  command => "npm install",
  require => [Exec["bowercomponentsinstall"]],
  cwd => "/var/www/progress",
}

# Install notify-send
package { "libnotify-bin":
  ensure => 'installed',
  require => Exec['aptgetupdate'],
}

# Run gulp to update public CSS / JS
exec { "gulp":
  path => [ "/bin/", "/sbin/" , "/usr/bin/", "/usr/sbin/", "/usr/local/bin" ],
  command => "gulp",
  require => [Exec["bowercomponentsinstall"], Package['libnotify-bin'], Exec['modulesinstall']],
  cwd => "/var/www/progress",
}