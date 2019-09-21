<p align="center">
  <a href="https://www.getshogun.com/">
    <img width="200" src="https://assets-global.website-files.com/5cbfa773633cb30f73421375/5cbfb26f2c7ff4b8d83386bb_logo.svg">
  </a>
</p>

# [Shogun Page Builder](https://www.getshogun.com/) module for Magento 2

## Description
This module connects a magento server and its websites to [Shogun](https://www.getshogun.com/), allowing magento administrators (admin users) the ability to create and design pages in Shogun and publish them to your magento websites.

To accomplish this, this module adds:

1. An entry to integrations called 'Shogun Page Builder - Integration', which can be seen in the administrator backend under the section **Extensions -> Integrations**
  - This integration allows Shogun to use a magento installation's [Admin Rest API](https://devdocs.magento.com/redoc/2.3/admin-rest-api.html), which is how Shogun will authenticate with the magento server, publish pages, and much more.
2. New custom API endpoints that allows Shogun to access or submit other information not given by the default magento admin rest API that Shogun needs to function correctly
  - For example, to allow for a page to be published to a certain store view (versus all store views) the `Block` & `Page` magento models needed to be modified to allow for submitting a `store_id`
3. A new admin section (located under **Content -> Shogun Labs -> Shogun Page Builder**) which embeds Shogun via an Iframe into the page, and allows admin users the ability to create, edit, and delete new magento pages with ease.

## Requirements
- Magento 2.0+
- A paid subscription to [Shogun](https://www.getshogun.com/)
  - You'll be prompted to choose a plan after accessing the page builder for the first time via your magento admin

## Preinstallation Notes

Before you install, you might want to set your server to maintenance mode, and backup your database. After you install, you'll want to disable maintenance mode, redeploy any static content, and clean the cache.

- Enable maintenance mode: `bin/magento maintenance:enable`
- Redeploy assets: `bin/magento setup:static-content:deploy`
- Clean the cache: `bin/magento cache:clean`
- Disable maintenance mode: `bin/magento maintenance:disable`

## Installation
### Via [Magento Marketplace](https://marketplace.magento.com/)
1. [Visit our extension page on the Magento Marketplace](https://marketplace.magento.com/shogun-shogun-page-builder-extension.html)
  - Make sure you are [loggged into your magento account](https://account.magento.com/applications/customer/login/).
2. Click the **Add To Cart** button
3. Go to the [checkout page](https://marketplace.magento.com/checkout/) and click **Place Order**
4. Click the **Install** button

At this point, go back to your Magento administrator backend, and do the following steps:

1. Go to **System -> Web Setup Wizard**
2. Click on the **Extension Manager** button
3. Click on the **Review and Install** button
4. Search for **shogun_labs/module-shogun-page-builder** on the listings, and click **Install** (you may need to paginate through multiple pages to find it, depending on how many extensions are listed)
5. Click on the **Start Readiness Check** button, then click the **Next** button at the top right once complete
6. Create a backup if needed, or uncheck all backups and then click the **Next** button at the top right
7. Wait for the 'Component Install' stage to finish

### Via [Composer](https://getcomposer.org/download/)
Navigate to your magento installation's root folder, and run the following commands below to install Shogun Page Builder via composer:

```
composer require shogun_labs/module-shogun-page-builder
bin/magento setup:upgrade
bin/magento setup:di:compile
```

### Manual Installation
- Download/clone this module from Github ([https://github.com/getshogun/module-shogun](https://github.com/getshogun/module-shogun))
  - From the command line: `git clone git@github.com:getshogun/module-shogun.git`
- Place the downloaded module folder into the `app/code` folder in your magento base directory
  - The directory path should look something like `/var/www/html/app/code/module-shogun/ShogunPageBuilder/...)`
- Run the following commands from your magento installation root folder:
  - `bin/magento setup:upgrade`
  - `bin/magento setup:di:compile`

## Setup (after completing installation)
### Verify and activate integration
- Login to your magento backend admin and go to **System -> Integrations**
- You should see an entry in the list of integrations for `Shogun Page Builder - Integration` - click **Activate**
- When the confirmation dialog appears, click **Allow**.
- A new popup window will appear when integrating with Shogun. Once it disappears, you should be taken back to the main integrations page, at which point the integration's status should be 'Active'.


### Access the Shogun Page Builder via the admin backend
- Navigate in the admin to **Content -> Shogun Labs -> Shogun Page Builder**
- Select a **Store View** to use Shogun with. If you have only one store, this should be the **Default Store View**.
- An iframe loading Shogun should appear.
  - If you have already signed in, you'll be taken straight to the Shogun dashboard.
  - If you have not signed in before to Shogun, a message asking to confirm your login will appear, which will send you an email confirming your login.
    - Once you've gotten the email and clicked the confirmation, you'll be logged into Shogun for that store view.

## License
Open Software License ("OSL") v3.0