# WpRestRegistration
A Simple Way to Register Rest Routes to WordPress

## Installation
The easiest way to install is using Composer in your Project

`composer require media-store-net/wp-rest-registration:dev-master`

Download the Repo on Github 
<br>https://github.com/media-store-net/WpRestRegistration

or clone it
<br>`git clone https://github.com/media-store-net/WpRestRegistration.git`

## How to use?

First you need define a Callback function in your functions.php or other File that is included in your Wordpres Installation or anyone of your Plugin Files.

#### Define Callback Function

* For GET Request<br>
`function myFunction() {
 // return anything as REST Logic
}`

* for POST Request<br>
`function myPostFunction($data) {
  // Do anything with $data
  // return response
}`

#### Use WpRestRegistration Class

now you can register a Route calling the WpRestRegistartion Class

_on Top of your php-file_

`use MediaStoreNet\WpRestRegistration\WpRestRegistration as Rest`

_register a Route_

`new Rest( $Namespace, $RestName, $Callback, $Method = GET, $actionHook = 'rest_api_init' )`

<hr>

_- basic usage for GET Request_

`new Rest( 'myApp/v1', 'myRestName', 'myFunction' );`

To call the RestRoute use https://myPage.com/wp-json/myApp/v1/myRestName in your Browser
or using Postman 

<hr>

_- basic usage for POST Request_

`new Rest( 'myApp/v1', 'myRestName', 'myPostFunction', 'POST' );`

Now you can call the same URL, using POST-Method and include $data to your Request

#### ** Have Fun **