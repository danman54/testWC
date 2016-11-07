<?php
    session_start();
?>
<!doctype html>
<!--
@license
Copyright (c) 2015 The Polymer Project Authors. All rights reserved.
This code may only be used under the BSD style license found at http://polymer.github.io/LICENSE.txt
The complete set of authors may be found at http://polymer.github.io/AUTHORS.txt
The complete set of contributors may be found at http://polymer.github.io/CONTRIBUTORS.txt
Code distributed by Google as part of the polymer project is also
subject to an additional IP rights grant found at http://polymer.github.io/PATENTS.txt
-->

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Polymer Starter Kit">
  <link rel="import" href="elements/wc-assess/wc-assess.html">
  <link rel="import" href="elements/wc-multi-select-input/wc-multi-select-input.html">
  <link rel="import" href="elements/wc-button-select-input/wc-button-select-input.html">
  <link rel="import" href="elements/wc-aroma-value-input/wc-aroma-value-input.html">
  <link rel="import" href="elements/wc-long-menu/wc-long-menu.html">

  <title>Winary Code</title>

  <!-- Place favicon.ico in the `app/` directory -->

  <!-- Chrome for Android theme color -->
  <meta name="theme-color" content="#2E3AA1">

  <!-- Web Application Manifest -->
  <link rel="manifest" href="manifest.json">

  <!-- Tile color for Win8 -->
  <meta name="msapplication-TileColor" content="#3372DF">

  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="application-name" content="PSK">
  <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png">

  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Polymer Starter Kit">
  <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png">

  <!-- Tile icon for Win8 (144x144) -->
  <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">

  <!-- build:css styles/main.css -->
  <link rel="stylesheet" href="styles/main.css">
  <!-- endbuild-->

  <!-- build:js bower_components/webcomponentsjs/webcomponents-lite.min.js -->
  <script src="bower_components/webcomponentsjs/webcomponents-lite.js"></script>
  <!-- endbuild -->

  <!-- Because this project uses vulcanize this should be your only html import
       in this file. All other imports should go in elements.html -->
  <link rel="import" href="elements/elements.html">

  <!-- For shared styles, shared-styles.html import in elements.html -->
  <style is="custom-style" include="shared-styles"></style>
</head>

<body unresolved>
  <span id="browser-sync-binding"></span>
  <template is="dom-bind" id="app">

    <paper-drawer-panel id="paperDrawerPanel">
      <!-- Drawer Scroll Header Panel -->
      <paper-scroll-header-panel drawer >

        <!-- Drawer Toolbar -->
        <paper-toolbar id="drawerToolbar">
          <span class="menu-name">Menu</span>
        </paper-toolbar>

        <!-- Drawer Content -->
        <paper-menu attr-for-selected="data-route" selected="[[route]]">
          <a data-route="home" href="{{baseUrl}}">
            <iron-icon icon="home"></iron-icon>
            <span>Home</span>
          </a>
          <a data-route="user-profile" href="{{baseUrl}}user-profile">
            <iron-icon icon="perm-identity"></iron-icon>
            <span>Profile</span>
          </a>
          <a data-route="white-assessment" href="{{baseUrl}}white-assessment">
            <iron-icon icon="info"></iron-icon>
            <span>White Assesment</span>
          </a>

          <a data-route="red-assessment" href="{{baseUrl}}red-assessment">
            <iron-icon icon="mail"></iron-icon>
            <span>Red Assessment</span>
          </a>

          <a data-route="register-wine" href="{{baseUrl}}register-wine">
            <iron-icon icon="assignment"></iron-icon>
            <span>Register Wine</span>
            </a>
            <!--Register Account Routing -->
          <a data-route="register-account" href="{{baseUrl}}register-account">
            <iron-icon icon="info"></iron-icon>
            <span>Register Account</span>
          </a>

          <!--Login declared here -->
          <a data-route="login-form" href="{{baseUrl}}login-form">
            <iron-icon icon="account-box"></iron-icon>
            <span>Login</span>
          </a>
        </paper-menu>
      </paper-scroll-header-panel>

      <!-- Main Area -->
      <paper-scroll-header-panel main id="headerPanelMain" condenses keep-condensed-header>
        <!-- Main Toolbar -->
        <paper-toolbar id="mainToolbar" class="tall">
          <paper-icon-button id="paperToggle" icon="menu" paper-drawer-toggle></paper-icon-button>

          <span class="space"></span>

          <!-- Toolbar icons -->
          <paper-icon-button icon="refresh"></paper-icon-button>
          <paper-icon-button icon="search"></paper-icon-button>

          <!-- Application name -->
          <div class="middle middle-container">
            <div class="app-name">Winary Code</div>
          </div>

          <!-- Application sub title -->
          <div class="bottom bottom-container">
            <div class="bottom-title">Sommeiler 2.0</div>
          </div>
        </paper-toolbar>

        <!-- Main Content -->
        <div class="content">
          <iron-pages attr-for-selected="data-route" selected="{{route}}">
            <section data-route="home">
              <paper-material elevation="1">
                <div>
                     <wc-search></wc-search>
                </div>
              </paper-material>
            </section>
            <section data-route="user-profile">
              <paper-material elevation="1">
              Update Profile
              <?php
                     if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
                         echo "User logged: " . $_SESSION['username'];
                     }

              ?>
                  <?php if (isset($_SESSION['username'])){ ?>
                  <form method="POST" action="api/updateProfile.php">
                        <paper-input-container>
                            <input is="iron-input" id = "inputPassword" name ="password" type ="text" placeholder = "Enter new password" required>
                        </paper-input-container>

                      <button name="updateProfile" type="submit">Update data</button>
                  </form>
                  <?php } else{ echo "<h2> Please Log in to alter profile </h2>"; }?>

                </paper-material>
            </section>
            <!-- White Wine Assessment Form-->
            <section data-route="white-assessment">
              <paper-material elevation="1">

              <h2 class="page-title">White Wine Assessment</h2>
                <form id="wc-white-assess" method="post" action="api/assess.php">
                    <h3> Primary Color </h3><br>
                    <input type="radio" name="primary_color" value=1>Straw
                    <input type="radio" name="primary_color" value=2>Yellow
                    <input type="radio" name="primary_color" value=3>Gold

                    <h3> Secondary Color </h3><br>
                    <input type="radio" name="secondary_color" value=1>None
                    <input type="radio" name="secondary_color" value=2>Silver
                    <input type="radio" name="secondary_color" value=3>Green
                    <input type="radio" name="secondary_color" value=4>Copper

                    <h3> Apple Pear </h3><br>
                    <input type="radio" name="apple_pear_level" value="0">None
                    <input type="radio" name="apple_pear_level" value="1">Low
                    <input type="radio" name="apple_pear_level" value="2">Medium
                    <input type="radio" name="apple_pear_level" value="3">High
                    <br>

                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"apple_pear"}'
                     handle-as="json"
                     last-response='{{applePearResponse}}'>
                    </iron-ajax>
                    <select name="apple_pear_aromas">
                        <template is="dom-repeat" items="{{applePearResponse}}">
                          <option value="{{item.apple_pear}}"> {{item.apple_pear}}</option>
                        </template>
                    </select>

                    <h3> Citrus Fruit </h3><br>
                    <input type="radio" name="citrus_level" value="0">None
                    <input type="radio" name="citrus_level" value="1">Low
                    <input type="radio" name="citrus_level" value="2">Medium
                    <input type="radio" name="citrus_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"citrus_fruit"}'
                     handle-as="json"
                     last-response='{{citrusResponse}}'>
                    </iron-ajax>
                    <select name="citrus_aromas">
                      <template is="dom-repeat" items="{{citrusResponse}}">
                        <option value="{{item.citrus_fruit}}"> {{item.citrus_fruit}}
                        </option>
                      </template>
                    </select>

                    <h3> Stone Fruit </h3><br>
                    <input type="radio" name="stone_level" value="0">None
                    <input type="radio" name="stone_level" value="1">Low
                    <input type="radio" name="stone_level" value="2">Medium
                    <input type="radio" name="stone_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"stone_fruit"}'
                     handle-as="json"
                     last-response='{{stoneResponse}}'>
                    </iron-ajax>
                    <select name="stone_aromas">
                        <template is="dom-repeat" items="{{stoneResponse}}">
                        <option value="{{item.stone_fruit}}"> {{item.stone_fruit}}</option>
                      </template>
                    </select>

                   <h3> Tropical Melon </h3>
                    <input type="radio" name="tropical_melon_level" value="0">None
                    <input type="radio" name="tropical_melon_level" value="1">Low
                    <input type="radio" name="tropical_melon_level" value="2">Medium
                    <input type="radio" name="tropical_melon_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"tropical_melon"}'
                     handle-as="json"
                     last-response='{{tropicalResponse}}'>
                    </iron-ajax>
                    <select name="tropical_melon_aromas">
                        <template is="dom-repeat" items="{{tropicalResponse}}">
                        <option value="{{item.tropical_melon}}"> {{item.tropical_melon}}</option>
                      </template>
                    </select>
                     <h3> Fruit Type </h3>
                    <input type="radio" name="fruit_type" value="1">Under Ripe
                    <input type="radio" name="fruit_type" value="2">Ripe
                    <input type="radio" name="fruit_type" value="3">Over Ripe Stem Jam
                    <input type="radio" name="fruit_type" value="4">Dried Baked

                    <h3> Flowers </h3>
                    <input type="radio" name="flower_level" value="0">None
                    <input type="radio" name="flower_level" value="1">Low
                    <input type="radio" name="flower_level" value="2">Medium
                    <input type="radio" name="flower_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"flowers"}'
                     handle-as="json"
                     last-response='{{flowerResponse}}'>
                    </iron-ajax>
                    <select name="flowers_aromas">
                        <template is="dom-repeat" items="{{flowerResponse}}">
                        <option value="{{item.flowers}}"> {{item.flowers}}</option>
                      </template>
                    </select>

                    <h3> Herbs </h3>
                    <input type="radio" name="herb_level" value="0">None
                    <input type="radio" name="herb_level" value="1">Low
                    <input type="radio" name="herb_level" value="2">Medium
                    <input type="radio" name="herb_level" value="3">High
                     <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"herbs"}'
                     handle-as="json"
                     last-response='{{herbsResponse}}'>
                    </iron-ajax>
                    <select name="herbs_aromas">
                      <template is="dom-repeat" items="{{herbsResponse}}">
                        <option value="{{item.herbs}}"> {{item.herbs}}</option>
                      </template>
                    </select>

                    <h3> Vegetal </h3>
                    <input type="radio" name="vegetal_level" value="0">None
                    <input type="radio" name="vegetal_level" value="1">Low
                    <input type="radio" name="vegetal_level" value="2">Medium
                    <input type="radio" name="vegetal_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"vegetal"}'
                     handle-as="json"
                     last-response='{{vegetalResponse}}'>
                    </iron-ajax>
                    <select name="vegetal_aromas">
                      <template is="dom-repeat" items="{{vegetalResponse}}">
                        <option value="{{item.vegetal}}"> {{item.vegetal}}</option>
                      </template>
                    </select>

                    <h3> Oxidative </h3>
                    <input type="radio" name="oxidative_level" value="0">None
                    <input type="radio" name="oxidative_level" value="1">Low
                    <input type="radio" name="oxidative_level" value="2">Medium
                    <input type="radio" name="oxidative_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"oxidative"}'
                     handle-as="json"
                     last-response='{{oxResponse}}'>
                    </iron-ajax>
                    <select name="oxidative_aromas">
                      <template is="dom-repeat" items="{{oxResponse}}">
                        <option value="{{item.oxidative}}"> {{item.oxidative}}</option>
                      </template>
                    </select>

                    <h3> Yeast Bread Dough  </h3>
                    <input type="radio" name="yeast_bread_dough_level" value="0">None
                    <input type="radio" name="yeast_bread_dough_level" value="1">Low
                    <input type="radio" name="yeast_bread_dough_level" value="2">Medium
                    <input type="radio" name="yeast_bread_dough_level" value="3">High
                    <br>
                     <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"yeast_bread_dough"}'
                     handle-as="json"
                     last-response='{{breadResponse}}'>
                    </iron-ajax>
                    <select name="yeast_bread_dough_aromas">
                        <template is="dom-repeat" items="{{breadResponse}}">
                        <option value="{{item.yeast_bread_dough}}"> {{item.yeast_bread_dough}}</option>
                      </template>
                    </select>

                    <h3> ML Butter Cream  </h3>
                    <input type="radio" name="ml_butter_cream_level" value="0">None
                    <input type="radio" name="ml_butter_cream_level" value="1">Low
                    <input type="radio" name="ml_butter_cream_level" value="2">Medium
                    <input type="radio" name="ml_butter_cream_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"ml_butter_cream"}'
                     handle-as="json"
                     last-response='{{mlResponse}}'>
                    </iron-ajax>
                    <select name="ml_butter_cream_aromas">
                      <template is="dom-repeat" items="{{mlResponse}}">
                        <option value="{{item.ml_butter_cream}}"> {{item.ml_butter_cream}}</option>
                      </template>
                    </select>

                    <h3> Earth Leaves Mushroom   </h3>
                    <input type="radio" name="earth_leaves_mushrooms_level" value="0">None
                    <input type="radio" name="earth_leaves_mushrooms_level" value="1">Low
                    <input type="radio" name="earth_leaves_mushrooms_level" value="2">Medium
                    <input type="radio" name="earth_leaves_mushrooms_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"earth_leaves_mushrooms"}'
                     handle-as="json"
                     last-response='{{earthResponse}}'>
                    </iron-ajax>
                    <select name="earth_leaves_mushrooms_aromas">
                      <template is="dom-repeat" items="{{earthResponse}}">
                        <option value="{{item.earth_leaves_mushrooms}}"> {{item.earth_leaves_mushrooms}}</option>
                      </template>
                    </select>

                    <h3> Mineral Stone  </h3>
                    <input type="radio" name="mineral_stone_sulfur_level" value="0">None
                    <input type="radio" name="mineral_stone_sulfur_level" value="1">Low
                    <input type="radio" name="mineral_stone_sulfur_level" value="2">Medium
                    <input type="radio" name="mineral_stone_sulfur_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"mineral_stone_sulfur"}'
                     handle-as="json"
                     last-response='{{mineralResponse}}'>
                    </iron-ajax>
                    <select name="mineral_stone_sulfur_aromas">
                      <template is="dom-repeat" items="{{mineralResponse}}">
                        <option value="{{item.mineral_stone_sulfur}}"> {{item.mineral_stone_sulfur}}</option>
                      </template>
                    </select>

                    <h3> Oak Vanilla Smoke Coconut </h3>
                    <input type="radio" name="oak_vanilla_smoke_coconut_level" value="0">None
                    <input type="radio" name="oak_vanilla_smoke_coconut_level" value="1">Low
                    <input type="radio" name="oak_vanilla_smoke_coconut_level" value="2">Medium
                    <input type="radio" name="oak_vanilla_smoke_coconut_level" value="3">High
                    <br>

                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/white-aroma-values.php"
                     params='{"var" :"oak_vanilla_toast_smoke_coconut"}'
                     handle-as="json"
                     last-response='{{oakResponse}}'>
                    </iron-ajax>
                    <select name="oak_vanilla_smoke_coconut_aromas">
                         <template is="dom-repeat" items="{{oakResponse}}">
                        <option value="{{item.oak_vanilla_toast_smoke_coconut}}"> {{item.oak_vanilla_toast_smoke_coconut}}</option>
                      </template>
                    </select>

                    <h3> Sweetness </h3><br>
                    <input type="radio" name="sweetness" value="1">Bone Dry
                    <input type="radio" name="sweetness" value="2">Dry
                    <input type="radio" name="sweetness" value="3">Off Dry
                    <input type="radio" name="sweetness" value="4">Med. Sweet

                    <h3> Acid </h3><br>
                    <input type="radio" name="acid" value="1"> Low
                    <input type="radio" name="acid" value="2"> Med. -
                    <input type="radio" name="acid" value="3"> Med. +
                    <input type="radio" name="acid" value="4"> High

                    <h3> Alcohol </h3><br>
                    <input type="radio" name="alcohol" value="1"> Low
                    <input type="radio" name="alcohol" value="2"> Med. -
                    <input type="radio" name="alcohol" value="3"> Med. +
                    <input type="radio" name="alcohol" value="4"> High

                    <h3> Bitter </h3><br>
                    <input type="radio" name="bitter" value="1"> Low
                    <input type="radio" name="bitter" value="2"> Med. -
                    <input type="radio" name="bitter" value="3"> Med. +
                    <input type="radio" name="bitter" value="4"> High

                    <h3> Balanced </h3><br>
                    <input type="radio" name="balanced" value="1">Yes
                    <input type="radio" name="balanced" value="2">No

                    <h3> Length </h3><br>
                    <input type="radio" name="length" value="1">Short
                    <input type="radio" name="length" value="2">Medium
                    <input type="radio" name="length" value="3">Medium Plus
                    <input type="radio" name="length" value="4">Long

                    <h3> Complexity </h3><br>
                    <input type="radio" name="complexity" value="1">Low
                    <input type="radio" name="complexity" value="2">Moderate
                    <input type="radio" name="complexity" value="3">Complex

                    <h3> Quality for price </h3><br>
                    <input type="radio" name="quality_for_price" value="1">Yes
                    <input type="radio" name="quality_for_price" value="2">No

                    <h3> Quality for price rate</h3><br>
                    <input type="radio" name="quality_for_price_rate" value="1">0
                    <input type="radio" name="quality_for_price_rate" value="2">1
                    <input type="radio" name="quality_for_price_rate" value="3">2
                    <input type="radio" name="quality_for_price_rate" value="4">3

                    <!-- Adds the wine info-->
                    <input id="winenamewhite" type="hidden" name="wine_name" >
                    <input id="wineproducerwhite" type="hidden" name="wine_producer" >
                    <input id="winestylewhite" type="hidden" name="wine_style" >
                    <input id="winevintagewhite" type="hidden" name="wine_vintage" >

                    <button class="btn" name="whiteAssessReturn" type="submit">Submit</button>
            </form>
                </paper-material>
              </section>

            <section data-route="red-assessment">
              <paper-material elevation="1">
                <form id="red-wine-assessment" method="post" action="api/assess.php">
                    <h3> Primary Color </h3><br>
                    <input type="radio" name="primary_color" value=1>Orange
                    <input type="radio" name="primary_color" value=2>Garnet
                    <input type="radio" name="primary_color" value=3>Ruby
                    <input type="radio" name="primary_color" value=4>Purple

                    <h3> Secondary Color </h3><br>
                    <input type="radio" name="secondary_color" value=1>Brown
                    <input type="radio" name="secondary_color" value=2>Black/blue

                    <h3> Red Fruit </h3><br>
                    <input type="radio" name="red_fruits_level" value=0>None
                    <input type="radio" name="red_fruits_level" value=1>Low
                    <input type="radio" name="red_fruits_level" value=2>Medium
                    <input type="radio" name="red_fruits_level" value=3>High
                    <br>

                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"red_fruit"}'
                     handle-as="json"
                     last-response='{{redFruitResponse}}'>
                    </iron-ajax>
                    <select name="red_aromas">
                        <template is="dom-repeat" items="{{redFruitResponse}}">

                          <option value="{{item.red_fruit}}"> {{item.red_fruit}}</option>

                        </template>
                    </select>

                    <h3> Black Fruit </h3><br>
                    <input type="radio" name="black_fruit_level" value="0">None
                    <input type="radio" name="black_fruit_level" value="1">Low
                    <input type="radio" name="black_fruit_level" value="2">Medium
                    <input type="radio" name="black_fruit_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"black_fruit"}'
                     handle-as="json"
                     last-response='{{blackFruitResponse}}'>
                    </iron-ajax>
                    <select name="black_aromas">
                      <template is="dom-repeat" items="{{blackFruitResponse}}">
                        <option value="{{item.black_fruit}}"> {{item.black_fruit}}</option>
                      </template>
                    </select>

                    <h3> Blue Fruit </h3><br>
                    <input type="radio" name="blue_fruit_level" value="0">None
                    <input type="radio" name="blue_fruit_level" value="1">Low
                    <input type="radio" name="blue_fruit_level" value="2">Medium
                    <input type="radio" name="blue_fruit_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"blue_fruit"}'
                     handle-as="json"
                     last-response='{{blueFruitResponse}}'>
                    </iron-ajax>
                    <select name="blue_aromas">
                        <template is="dom-repeat" items="{{blueFruitResponse}}">
                        <option value="{{item.blue_fruit}}"> {{item.blue_fruit}}</option>
                      </template>
                    </select>

                    <h3> Fruit Type </h3>
                    <input type="radio" name="fruit_type" value="1">Under Ripe
                    <input type="radio" name="fruit_type" value="2">Ripe
                    <input type="radio" name="fruit_type" value="3">Over Ripe Stem Jam
                    <input type="radio" name="fruit_type" value="4">Dried Baked

                    <h3> Flowers </h3>
                    <input type="radio" name="flowers_level" value="0">None
                    <input type="radio" name="flowers_level" value="1">Low
                    <input type="radio" name="flowers_level" value="2">Medium
                    <input type="radio" name="flowers_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"flowers"}'
                     handle-as="json"
                     last-response='{{flowerResponse}}'>
                    </iron-ajax>
                    <select name="flowers_aromas">
                        <template is="dom-repeat" items="{{flowerResponse}}">
                        <option value="{{item.flowers}}"> {{item.flowers}}</option>
                      </template>
                    </select>

                    <h3> Herbs </h3>
                    <input type="radio" name="herbs_level" value="0">None
                    <input type="radio" name="herbs_level" value="1">Low
                    <input type="radio" name="herbs_level" value="2">Medium
                    <input type="radio" name="herbs_level" value="3">High
                     <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"herbs"}'
                     handle-as="json"
                     last-response='{{herbsResponse}}'>
                    </iron-ajax>
                    <select name="herbs_aromas">
                      <template is="dom-repeat" items="{{herbsResponse}}">
                        <option value="{{item.herbs}}"> {{item.herbs}}</option>
                      </template>
                    </select>

                    <h3> Vegetal </h3>
                    <input type="radio" name="vegetal_level" value="0">None
                    <input type="radio" name="vegetal_level" value="1">Low
                    <input type="radio" name="vegetal_level" value="2">Medium
                    <input type="radio" name="vegetal_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"vegetal"}'
                     handle-as="json"
                     last-response='{{vegetalResponse}}'>
                    </iron-ajax>
                    <select name="vegetal_aromas">
                      <template is="dom-repeat" items="{{vegetalResponse}}">
                        <option value="{{item.vegetal}}"> {{item.vegetal}}</option>
                      </template>
                    </select>

                    <h3> Mint Eucalyptus  </h3>
                    <input type="radio" name="mint_eucalyptus_level" value="0">None
                    <input type="radio" name="mint_eucalyptus_level" value="1">Low
                    <input type="radio" name="mint_eucalyptus_level" value="2">Medium
                    <input type="radio" name="mint_eucalyptus_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"mint_eucalyptus"}'
                     handle-as="json"
                     last-response='{{mintEucalyptusResponse}}'>
                    </iron-ajax>
                    <select name="mint_eucalyptus_aromas">
                      <template is="dom-repeat" items="{{mintEucalyptusResponse}}">
                        <option value="{{item.mint_eucalyptus}}"> {{item.mint_eucalyptus}}</option>
                      </template>
                    </select>

                    <h3> Pepper Spice  </h3>
                    <input type="radio" name="pepper_spice_level" value="0">None
                    <input type="radio" name="pepper_spice_level" value="1">Low
                    <input type="radio" name="pepper_spice_level" value="2">Medium
                    <input type="radio" name="pepper_spice_level" value="3">High
                    <br>
                     <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"pepper_spice"}'
                     handle-as="json"
                     last-response='{{pepperResponse}}'>
                    </iron-ajax>
                    <select name="pepper_spice_aromas">
                        <template is="dom-repeat" items="{{pepperResponse}}">
                        <option value="{{item.pepper_spice}}"> {{item.pepper_spice}}</option>
                      </template>
                    </select>

                    <h3> Cocoa Coffee  </h3>
                    <input type="radio" name="cocoa_coffee_level" value="0">None
                    <input type="radio" name="cocoa_coffee_level" value="1">Low
                    <input type="radio" name="cocoa_coffee_level" value="2">Medium
                    <input type="radio" name="cocoa_coffee_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"cocoa_coffee"}'
                     handle-as="json"
                     last-response='{{cocoaResponse}}'>
                    </iron-ajax>
                    <select name="cocoa_coffee_aromas">
                      <template is="dom-repeat" items="{{cocoaResponse}}">
                        <option value="{{item.cocoa_coffee}}"> {{item.cocoa_coffee}}</option>
                      </template>
                    </select>

                    <h3> Meat Leather  </h3>
                    <input type="radio" name="meat_leather_level" value="0">None
                    <input type="radio" name="meat_leather_level" value="1">Low
                    <input type="radio" name="meat_leather_level" value="2">Medium
                    <input type="radio" name="meat_leather_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"meat_leather"}'
                     handle-as="json"
                     last-response='{{meatResponse}}'>
                    </iron-ajax>
                    <select name="meat_leather_aromas">
                      <template is="dom-repeat" items="{{meatResponse}}">
                        <option value="{{item.meat_leather}}"> {{item.meat_leather}}</option>
                      </template>
                    </select>

                    <h3> Tobacco Tar  </h3>
                    <input type="radio" name="tobacco_tar_level" value="0">None
                    <input type="radio" name="tobacco_tar_level" value="1">Low
                    <input type="radio" name="tobacco_tar_level" value="2">Medium
                    <input type="radio" name="tobacco_tar_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"tobacco_tar"}'
                     handle-as="json"
                     last-response='{{tobaccoResponse}}'>
                    </iron-ajax>
                    <select name="tobacco_tar_aromas">
                      <template is="dom-repeat" items="{{tobaccoResponse}}">
                        <option value="{{item.tobacco_tar}}"> {{item.tobacco_tar}}</option>
                      </template>
                    </select>

                    <h3> Earth Leaves Mushroom   </h3>
                    <input type="radio" name="earth_leaves_mushrooms_level" value="0">None
                    <input type="radio" name="earth_leaves_mushrooms_level" value="1">Low
                    <input type="radio" name="earth_leaves_mushrooms_level" value="2">Medium
                    <input type="radio" name="earth_leaves_mushrooms_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"earth_leaves_mushrooms"}'
                     handle-as="json"
                     last-response='{{earthResponse}}'>
                    </iron-ajax>
                    <select name="earth_leaves_mushrooms_aromas">
                      <template is="dom-repeat" items="{{earthResponse}}">
                        <option value="{{item.earth_leaves_mushrooms}}"> {{item.earth_leaves_mushrooms}}</option>
                      </template>
                    </select>

                    <h3> Mineral Stone  </h3>
                    <input type="radio" name="mineral_stone_sulfur_level" value="0">None
                    <input type="radio" name="mineral_stone_sulfur_level" value="1">Low
                    <input type="radio" name="mineral_stone_sulfur_level" value="2">Medium
                    <input type="radio" name="mineral_stone_sulfur_level" value="3">High
                    <br>
                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"mineral_stone_sulfur"}'
                     handle-as="json"
                     last-response='{{mineralResponse}}'>
                    </iron-ajax>
                    <select name="mineral_stone_sulfur_aromas">
                      <template is="dom-repeat" items="{{mineralResponse}}">
                        <option value="{{item.mineral_stone_sulfur}}"> {{item.mineral_stone_sulfur}}</option>
                      </template>
                    </select>

                    <h3> Oak Vanilla Smoke Coconut </h3>
                    <input type="radio" name="oak_vanilla_smoke_coconut_level" value="0">None
                    <input type="radio" name="oak_vanilla_smoke_coconut_level" value="1">Low
                    <input type="radio" name="oak_vanilla_smoke_coconut_level" value="2">Medium
                    <input type="radio" name="oak_vanilla_smoke_coconut_level" value="3">High
                    <br>

                    <iron-ajax auto
                     id="ajax"
                     method="GET"
                     url="api/red-aroma-values.php"
                     params='{"var" :"oak_vanilla_toast_smoke_coconut"}'
                     handle-as="json"
                     last-response='{{oakResponse}}'>
                    </iron-ajax>
                    <select name="oak_vanilla_smoke_coconut_aromas">
                         <template is="dom-repeat" items="{{oakResponse}}">
                        <option value="{{item.oak_vanilla_toast_smoke_coconut}}"> {{item.oak_vanilla_toast_smoke_coconut}}</option>
                      </template>
                    </select>

                    <h3> Sweetness </h3><br>
                    <input type="radio" name="sweetness" value="1">Bone Dry
                    <input type="radio" name="sweetness" value="2">Dry
                    <input type="radio" name="sweetness" value="3">Off Dry
                    <input type="radio" name="sweetness" value="4">Med. Sweet

                    <h3> Alcohol </h3><br>
                    <input type="radio" name="alcohol" value="1"> Low
                    <input type="radio" name="alcohol" value="2"> Med. -
                    <input type="radio" name="alcohol" value="3"> Med. +
                    <input type="radio" name="alcohol" value="4"> High

                    <h3> Tannin </h3><br>
                    <input type="radio" name="tannin" value="1"> Low
                    <input type="radio" name="tannin" value="2"> Med. -
                    <input type="radio" name="tannin" value="3"> Med. +
                    <input type="radio" name="tannin" value="4"> High

                    <h3> Bitter </h3><br>
                    <input type="radio" name="bitter" value="1"> Low
                    <input type="radio" name="bitter" value="2"> Med. -
                    <input type="radio" name="bitter" value="3"> Med. +
                    <input type="radio" name="bitter" value="4"> High

                    <h3> Balanced </h3><br>
                    <input type="radio" name="balanced" value="1">Yes
                    <input type="radio" name="balanced" value="2">No

                    <h3> Length </h3><br>
                    <input type="radio" name="length" value="1">Short
                    <input type="radio" name="length" value="2">Medium
                    <input type="radio" name="length" value="3">Medium Plus
                    <input type="radio" name="length" value="4">Long

                    <h3> Complexity </h3><br>
                    <input type="radio" name="complexity" value="1">Low
                    <input type="radio" name="complexity" value="2">Moderate
                    <input type="radio" name="complexity" value="3">Complex

                    <h3> Quality for price </h3><br>
                    <input type="radio" name="quality_for_price" value="1">Yes
                    <input type="radio" name="quality_for_price" value="2">No

                    <h3> Quality for price rate</h3><br>
                    <input type="radio" name="quality_for_price_rate" value="1">0
                    <input type="radio" name="quality_for_price_rate" value="2">1
                    <input type="radio" name="quality_for_price_rate" value="3">2
                    <input type="radio" name="quality_for_price_rate" value="4">3

                    <!-- Adds the wine info-->
                    <input id="winenamered" type="hidden" name="wine_name">
                    <input id="wineproducerred" type="hidden" name="wine_producer">
                    <input id="winestylered" type="hidden" name="wine_style">
                    <input id="winevintagered" type="hidden" name="wine_vintage">

                    <button class="btn" name="redAssessReturn" type="submit">Submit</button>
              </form>
            </paper-material>
          </section>
          <section data-route="register-wine">
              <paper-material elevation="1">
                <!--Masons Section-->
                <form is="iron-form" id="register-wine-form" method="post" action="api/register-wine.php">
                  <h3>Insert Wine Data! </h3>
                  <paper-input-container>
                      <input is="iron-input" id = "inputProducer" name ="producer" type ="text" placeholder = "Producer" required>
                  </paper-input-container>

                  <paper-input-container>
                      <input is="iron-input" id = "inputName" name ="wname" type ="text" placeholder = "Wine Name" required>

                  </paper-input-container>

                  <paper-input-container>
                      <input is="iron-input" id = "inputGrape" name ="grape" type ="text" placeholder = "Grape (Optional)">

                  </paper-input-container>

                    <select name="wine_styles">
                      <option value = "Sparkling White">Sparkling White</option>
                        <option value = "Sparkling Rose">Sparkling Rose</option>
                        <option value = "Still White">Still White</option>
                        <option value = "Still Red">Still Red</option>
                        <option value = "Dessert">Dessert </option>
                        <option value = "Fortified White">Fortified White</option>
                        <option value = "Fortified Red">Fortified Red</option>
                    </select>

                  <paper-input-container>
                      <input is="iron-input" id = "inputCountry" name ="country" type ="text" placeholder = "Country" required>
                  </paper-input-container>

                  <paper-input-container>
                      <input is="iron-input" id = "inputState" name ="state" type ="text" placeholder = "State/Province" required>
                  </paper-input-container>

                  <paper-input-container>
                      <input is="iron-input" id = "inputRegion" name ="region" type ="text" placeholder = "Region (Optional)">
                  </paper-input-container>

                  <paper-input-container>
                      <input is="iron-input" id = "inputSubRegion" name ="sRegion" type ="text" placeholder = "Sub-Region (Optional)">
                  </paper-input-container>

                  <paper-input-container>
                      <input is="iron-input" id = "inputAlcohol" name ="alcohol" type ="number" placeholder = "Alcohol Percentage (##)" required>
                  </paper-input-container>
                    <button name="regWine" onclick="comparison()" type="submit">Register Wine</button>
                </form>
              </paper-material>
            </section>
             <!-- Register Account Form -->
            <section data-route="register-account">
              <paper-material elevation="1">
                <form id="register-account-form" method="post"  onsubit= "return comparison();"action="api/register-user.php">
                  <h3>Create an Account</h3>
                  <paper-input-container>
                      <input is="iron-input" id = "inputProducer" name ="username" type ="text" placeholder = "Username" required>
                  </paper-input-container>
                  <paper-input-container>
                      <input is="iron-input" type = "password" id = "pass1" name ="password" type ="text" placeholder = "Password" required>
                  </paper-input-container>
                  <paper-input-container>
                      <input is="iron-input" type = "password" id = "pass2" onkeyup="checkPass()" name ="confirm_password" type ="text" placeholder = "Confirm Password" required>
                      <span id="confirmMessage" class="confirmMessage"></span>
                  </paper-input-container>
                  <paper-input-container>
                      <input is="iron-input" id = "email1" name ="email" type ="text" placeholder = "E-mail" required>
                  </paper-input-container>
                  <paper-input-container>
                      <input is="iron-input" id = "email2" name ="confirm-email" onkeyup="checkEmail()" type ="text" placeholder = "Confirm Email" required>
                      <span id = "confirmMessage2" class="confirmMessage2"></span>
                  </paper-input-container>
                  <paper-input-container>
                      <input is="iron-input" id = "inputProducer" name ="firstname" type ="text" placeholder = "First name" required>
                  </paper-input-container>
                  <paper-input-container>
                      <input is="iron-input" id = "inputProducer" name ="lastname" type ="text" placeholder = "Last name" required>
                  </paper-input-container>

                  <label>Age</label><br><br>
                   <select name="age">
                      <option value = "0"> Prefer not to answer</option>
                        <option value = "1"> 20 - 25 </option>
                        <option value = "2"> 26 - 30 </option>
                        <option value = "3"> 31 - 35 </option>
                        <option value = "4"> 36 - 40 </option>
                        <option value = "5"> 41 - 45 </option>
                        <option value = "6"> 45 - 50 </option>
                        <option value = "7"> 51 - 55 </option>
                        <option value = "8"> 55 and older </option>
                    </select>
                  <paper-input-container>
                      <input is="iron-input" id = "inputProducer" name ="zipcode" type ="text" placeholder = "Zip code" required>
                  </paper-input-container>
                   <select name="employment">
                        <option value = "consumer">Consumer</option>
                        <option value = "producer">Producer</option>
                        <option value = "service">Service/Sales</option>
                        <option value = "buyer">Buyer</option>
                    </select>
                   <select name="cert_body">
                        <option value = "none"> None </option>
                        <option value = "Court of Master Sommeliers Intro Certificate">Court of Master Sommeliers Intro Certificate</option>
                        <option value = "Court of Master Sommeliers Certified Sommelier">Court of Master Sommeliers Certified Sommelier</option>
                        <option value = "Court of Master Sommeliers Advanced Level">Court of Master Sommeliers Advanced Level</option>
                    </select>
                  <paper-input-container>
                      <input is="iron-input" id = "inputProducer" name ="date" type ="text" placeholder = "Date certified" required>
                  </paper-input-container>

                    <button name="regAccount" type="submit">Register Account</button>
                </form>
              </paper-material>
            </section>

             <section data-route="login-form">
              <paper-material elevation="1">
                <div>
                <?php if(!isset($_SESSION['username'])) { ?>
                 <form action="api/local-login.php" method="POST">
                   <h1>Please Login</h1>
                   <input type="text" name="username" placeholder = "Username" value="">
                   <input type="password" name="password" placeholder = "Password" value="">
                     <!--<button type="submit" name="login-submit">Submit</button>-->
                   <button name="loginForm" type="submit">Login</button>
                 </form>
                 <?php } else { ?>
                 <form action="api/local-login.php" method="POST">
                   <h1>Logout</h1>
                   <button name="logoutForm" type="submit">Logout</button>
                 </form>
                 <?php } ?>
                </div>
              </paper-material>
            </section>

          </iron-pages>
        </div>
      </paper-scroll-header-panel>
    </paper-drawer-panel>
    <paper-toast id="toast">
      <span class="toast-hide-button" role="button" tabindex="0" onclick="app.$.toast.hide()">Ok</span>
    </paper-toast>

  </template>

  <!-- build:js scripts/app.js -->
  <script src="scripts/app.js"></script>
  <script src ="scripts/validation.js"></script>
  <!-- endbuild-->
</body>
</html>
