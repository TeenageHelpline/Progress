# Install cURL
package { "curl":
  ensure => installed,
}

# Install Composer
exec { 'install composer':
  command => '/usr/bin/curl -sS https://getcomposer.org/installer | php && sudo mv composer.phar /usr/local/bin/composer',
  require => Package['curl'],
}

# Apache configuration
class { 'apache':
  mpm_module => "prefork",
  default_vhost => false,
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
class { '::apache::mod::php': }

# Set PHP configuration
file { '/etc/php5/apache2/php.ini':
  ensure => "link",
  target => "/vagrant/manifests/php/php.ini",
  replace => true,
  force => true,
  require => Class['::apache::mod::php'],
}