default_run_options[:pty] = true  # Must be set for the password prompt from git to work

# WebFaction user account
# This is the server user account
set :server_user, "root"

# Server Domain
set :domain, "mistermachineshop.com"
set :user, server_user
# Repository User
set :repo_user, "menslow"
# Repository Name
set :repo_name, "earthmoves"

# Application directory on the server
set :application, "earthmoves"

# Repository location
set :repository, "git@github.com:#{repo_user}/#{repo_name}.git"

# Default repository branch to checkout
set :branch, "master"

# We're using submodules [WordPress] & themes:[<theme_name>]
set :git_enable_submodules, 1

# We're using git as our repository
set :scm, :git

# Tell Capistrano to use agent forwarding with this command. uses your local keys instead of keys installed on the server.
ssh_options[:forward_agent] = true
ssh_options[:keys] = [File.join(ENV["HOME"], ".ssh", "id_mistermachineshop_rsa")]

# Deploy settings
set :deploy_to, "/var/www/#{application}"

# Fetch only the changes since the last.
set :deploy_via, :remote_cache

# Exclude the following files
set :copy_exclude, [".git", ".DS_Store", ".gitignore", ".gitmodules", "env_local", "env_prod", "env_stage"]

set :copy_compression, :gzip

# Options
set :use_sudo, false
set :keep_releases, 5

set :env, "dev"

# Timestamp
set :time_stamp, Time.now.to_i

# Roles & servers
role :app, domain
role :web, domain
role :db, domain, :primary => true

server "#{domain}", :app, :primary => true

# Taskst to perform during with production flag
# When using --`$: cap production deploy`
task :production do
    set :env, "prod"
end

task :staging do
    set :env, "stage"
end

# Custom deployment namespace
namespace :customs do
    desc "Symlinking files"
    task :make_symlink, :roles => :app do
        run "ln -nfs #{shared_path}/uploads #{release_path}/wp-content/uploads"
        run "ln -nfs #{shared_path}/blogs.dir #{release_path}/wp-content/blogs.dir"
    end
end

after "deploy:finalize_update", "customs:make_symlink"
#after "deploy:finalize_update", "customs:set_environment"
#after "deploy:finalize_update", "themes:update_config"
after "deploy", "deploy:cleanup"