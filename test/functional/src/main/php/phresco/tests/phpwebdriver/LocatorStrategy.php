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
class LocatorStrategy {
    /**Returns an element whose class name contains the search value; compound class names are not permitted.*/
    const className="class name";

    /**Returns an element matching a CSS selector.*/
    const cssSelector="css selector";

    /**Returns an element whose ID attribute matches the search value.*/
    const id="id";

    /**Returns an element whose NAME attribute matches the search value.*/
    const name="name";

    /**Returns an anchor element whose visible text matches the search value.*/
    const linkText="link text";

    /**Returns an anchor element whose visible text partially matches the search value.*/
    const partialLinkText="partial link text";

    /**Returns an element whose tag name matches the search value.*/
    const tagName="tag name";

    /**Returns an element matching an XPath expression.*/
    const xpath="xpath";
}
?>
