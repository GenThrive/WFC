# Water Calculator (water-calculator)

This repo contains Cornershop Creative's stock WordPress install. It includes a number of oft-used plugins, our custom-built Crate theme, and a database dump to facilitate getting up and running quickly.

# How do I use it?

Good question. Here's the general process:

### 1. Fork this repository

Give it the same name as the "Short Name" indicated in the [Pipeline smartsheet](https://app.smartsheet.com/b/home?lx=BQoCBSl1raFIpy4uUPSLvg) and make sure the owner is set to **cornershopcreative** instead of your own account.

### 2. SSH to the dev server

Use SSH to access the development server as either yourself or the dev user. Then, run this command:

```
#!bash

setupsite SHORTNAME
```

to bring all the files down from Bitbucket, set up the WordPress database, and perform some initial configuration. [Learn more about setupsite](https://docs.google.com/document/d/1MPU2cWUx6y73GWhks9b_tZs1XNluGtAqu8k-mACbuLM/edit).

Follow setupsite's directions and respond to any prompts it gives you.

Note: Just providing the SHORTNAME will only work with Bitbucket SSH keys properly configured. If you need to use HTTPS, enter the full Bitbucket URL.

### 3. Commit all changes

The setupsite script will perform some commits for you, but if there're any lingering uncommitted modifications, you should commit them. You should also try manually updating any and all premium plugins that might be out-of-date (all free plugins should be current).

```
#!bash

cd sites/SHORTNAME
git add -A .
git commit -m "Configuration changes from setupsite script"
```

### 4. Activate plugins

Because plugins are installed via composer, the database doesn't have a record of which ones should be active. You'll need to manually activate the ones you need using wp-cli or the wordpress admin.

---

# Managing dependencies

There's a composer.json file in the root of the repository that contains information on the plugins/themes that are to be included. If you created an instance of a site by using setupsite, it should have automatically downloaded them all. If not, or setupsite went awry somehow, you should be able to install them by running composer from the root folder of the project:

```
#!bash

composer install
```

If that doesn't work, you may need to [install composer](https://getcomposer.org/doc/00-intro.md) and/or review the composer documentation to get things straightened out. Other developers can help!

Once installed, plugins will be tracked in git just like the rest of the codebase (this is largely to facilitate deployments to production). While you _can_ use composer to update them, it's probably best to use wp-cli to perform plugin (and theme!) updates, since your project probably has plugins that are not managed by composer (because they're premium or were installed separately).

---

# Using Gulp

This version of Crate is bundled with the necessary tools and components to utilize gulp.js to automate some tasks, such as uglifying javascript, creating sprites, and running live updates. Make sure you have Gulp installed, then from the Crate directory you'll need to install the dependencies:

```
#!bash

npm install -g gulp
cd cms/assets/themes/crate/
npm install --save-dev
```

Once you have Gulp, there are a bunch of commands/tasks you can execute within Crate. [Read our gulp documentation](https://docs.google.com/document/d/1_1HbSB_6t3tNUqSVYGxQDaq2A_QXfEuFzqKyYi1z7i4/edit) for details. The gulpfile was written by Danny Cabrera, who is the best resource if you have problems.

---

# Using Produce

Produce is the wp-cli-based plugin Cornershop has developed that contains configurable scaffolding for many common development tasks, such as building out custom post types, styling the login screen, building a site options page, etc. As a wp-cli command, it is somewhat self-documenting:

```
#!bash

wp plugin activate produce
wp help produce
```

More information on Produce may be available at https://bitbucket.org/cornershopcreative/plugin-produce
