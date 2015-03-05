# Craft Setup
This repository has a modified directory structure so we don't have to worry about tracking the core Craft files in Git. This is especially helpful each time Craft is updated, so we don't have to push/pull the large amount of files each time.

Upon launch of the site **you will need to get a new license key**.

## Repo File Structure
- `/compile`
	- Where your Sass & JavaScript lives and is processed from.
- `/config`
	- Where the Craft configuration files live.
	- This has been moved from core to the root level.
- `/core`
	- no longer tracked with Git. You will need to download this. Instructions are below.
- `/plugins`
	- Where all the Craft plugins live.
	- This has been moved from core to the root level.
- `/templates`
	- Where all the section templates live.
	- This has been moved from core to the root level.
- `/www`
	- This is your public folder.
	- Compile Sass & JavaScript will end up here.

## Local Install
#### 0. Setup local database
- Create database using whichever tool you prefer.
	- [Adminer](http://www.adminer.org/)
	- phpMyAdmin
	- command line
- Ensure your user has permissions. It probably already does.

#### 1. Clone The Repository
```bash
git clone git@github.com:designbycosmic/craft-starter.git YOUR_PROJECT_NAME
cd YOUR_PROJECT_NAME
rm -rf .git
git init
git remote add origin git@github.com:USERNAME/YOUR_NEW_REPO_NAME.git
git remote -v
git add .
git push origin master
```

#### 2. Update Craft config files with your information
- `config/db.php`
- `config/general.php`

#### 3. Download Craft
- Here's a bash function that will run all the steps necessary
- Ensure that you're at the root level of the new project
```bash
function get_craft() {
    wget -O craft.zip https://buildwithcraft.com/latest.zip?accept_license=yes
    mkdir craft
    tar -zxvf craft.zip -C craft
    mv craft/craft core
    rm -rf core/templates
    rm -rf core/plugins
    rm -rf core/config
    rm -rf craft
    rm craft.zip
}
```

**or**

1. Click [here](https://buildwithcraft.com/latest.zip?accept_license=yes) to download the latest one.
2. Inside the directory that was extracted, move the `craft` directory into the project.
3. Rename the moved `craft` directory to `core`.
4. Delete the following directories that are inside the `core` directory as they're setting up to be used outside of the `core` folder.

#### 4. Install Craft
- Go to `YOUR_IP/www/admin/` and it will take you through the install.
- While installing you'll be asked for a few things
	- Site URL should be `{siteUrl}`
	- File System Path should be `{fileSystemPath}`
	- *Info about this in the [Craft Documentation](http://buildwithcraft.com/docs/multi-environment-configs)*

## Gulp
Gulp will compile, live reload and inject styles as you develop. Get the [live reload chrome plugin](https://chrome.google.com/webstore/detail/livereload/jnihajbhpnppcggbcgedagnkighmdlei) if you don't already have it.

- Install Gulp globally if you haven't already
	- `npm install gulp -g`
- Inside the project directory with the gulp file `compile`.
	- `npm install`
- Get deving!
	- `gulp watch`

*I suggest having a separate shell for this so you don't have to stop running Gulp each time you want to commit.*

[Good place to get familiar with Gulp, if you're completely new to it.](http://markgoodyear.com/2014/01/getting-started-with-gulp/) Keep in mind we use a package.json file to handle dev dependencies. So there's no need to do individual `npm install`s. Running `npm install` is fine.
