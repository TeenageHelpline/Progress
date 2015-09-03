# Install cURL
package { "curl":
  ensure => installed,
}

# Apache configuration
class { 'apache':
  mpm_module => "prefork",
  default_vhost => false,
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
}

# Install NPM
package { "npm":
  ensure => 'installed',
  require => Package['node'],
}

# Install Bower
exec { "bowerinstall":
  path => [ "/bin/", "/sbin/" , "/usr/bin/", "/usr/sbin/" ],
  command => "npm install -g bower",
  require => [Package['npm']],
}