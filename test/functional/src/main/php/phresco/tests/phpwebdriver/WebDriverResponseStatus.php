<?php /*
 * ###
 * PHR_PhpBlog
 * %%
 * Copyright (C) 1999 - 2012 Photon Infotech Inc.
 * %%
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ###
 */ ?>
<?php
class WebDriverResponseStatus {
    const Success 	= 0;    //The command executed successfully.
    const NoSuchElement 	=7;     //An element could not be located on the page using the given search parameters.
    const NoSuchFrame 	=8;     //A request to switch to a frame could not be satisfied because the frame could not be found.
    const UnknownCommand 	=9;     //The requested resource could not be found, or a request was received using an HTTP method that is not supported by the mapped resource.
    const StaleElementReference=10;   	//An element command failed because the referenced element is no longer attached to the DOM.
    const ElementNotVisible=11; 	//An element command could not be completed because the element is not visible on the page.
    const InvalidElementState=12; 	//An element command could not be completed because the element is in an invalid state (e.g. attempting to click a disabled element).
    const UnknownError=13; 	//An unknown server-side error occurred while processing the command.
    const ElementIsNotSelectable=15; 	//An attempt was made to select an element that cannot be selected.
    const JavaScriptError=17; 	//An error occurred while executing user supplied JavaScript.
    const XPathLookupError=19; 	//An error occurred while searching for an element by XPath.
    const NoSuchWindow=23; 	//A request to switch to a different window could not be satisfied because the window could not be found.
    const InvalidCookieDomain=24; 	//An illegal attempt was made to set a cookie under a different domain than the current page.
    const UnableToSetCookie=25; 	//A request to set a cookie's value could not be satisfied.
    const Timeout=28;         //A command did not complete before its timeout expired.
    
}
?>
