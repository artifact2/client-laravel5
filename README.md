> You might also like artifact2.com.

## Artifact2 Client for Laraval  5.5

Skeleton client package in PHP for working with Artifact2 Headless CMS.

[Demo](https://artifact2.com) |

[Documentation](https://artifact2.com)

### Features

* Secure
* Easy to learn
* Super Fast
* Extensible


### Installation PHP

The <code>ClientController</code> and <code>Client</code> classes are pretty straight-forward.
You can remove all Laravel dependencies (such as the views) and create your own methods to return HTML.


### Installation Laravel 5.5

In  a fresh Laravel 5 installation add the following lines to composer.json

``` json
"repositories": [
    {
        "type": "package",
        "package": {
            "name": "artifact2/client-laravel5",
            "version": "dev-master",
            "source": {
                "url": "git://github.com/artifact2/client-laravel5.git",
                "type": "git",
                "reference": "master"
            },
            "autoload": {
                "psr-0" : {
                    "Artifact\\Client" : "src"
                }
            }
        }
    }
],
```

Register your website at artifact2.com.
You will receive an email with further instructions.

Add the following line in your .env file
```

...
APP_URL=https://www.yourdomain.com
ESB_URI=https://sbxxxx.artifact2.com
...

```

Make sure you delete all routes in https/routes/web.php

```
    // Yes, indeed, delete all routes in web.php
    //
    // Your routing is handled by the client-laravel5 package
```


That's it. Navigate to your website <code>https://www.yourdomain.com</code>. Login with the user and password you receive
 from artifact2.com. Once you are logged in, you can:

* Change your password (!)
* Edit your profile and settings
* Add users and permissions
* Create new webpages
* Create a blog
* Create address book
* Create anything you want ...

As you will learn soon, everthing in Artifact2 is based on a __Collection__ and its __Attributes__.
Make sure you read the Collection section in the [Artifact2 documentation](https://artifact2.com).

### Understanding Client::requestMethod ###

Artifact2 uses a _Command Driven API_.
Learn more about CDAPI's and read the CDAPI documentation in the [Artifact2 documentation](https://artifact2.com/)

### Questions

**Do I need to subscribe on artifact2.com?**

Yes. You can subscribe for a free account on artifact2.com.

**Where is my data stored?**

Your data is stored in one of our datacenters in Amsterdam, Tokio, Barcelona, Miami or Los Angelos.

You can download all your data at any moment in MySql format or as zipped static website.


**Who uses it?**

[phpDocumentor](http://www.phpdoc.org/), [October CMS](http://octobercms.com/), [Bolt CMS](http://bolt.cm/), [Kirby CMS](http://getkirby.com/), [Grav CMS](http://getgrav.org/), [Statamic CMS](http://www.statamic.com/), [Herbie CMS](http://www.getherbie.org/), [RaspberryPi.org](http://www.raspberrypi.org/), [Symfony demo](https://github.com/symfony/symfony-demo) and [more](https://packagist.org/packages/erusev/parsedown/dependents).


**How can I help?**

Use it, star it, share it and if you feel generous, [donate](https://www.paypal.com/]).
