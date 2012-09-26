/*global require */

require ( [ "jquery", "eshop/widgets/Products", "eshop/widgets/EShopAPI", "eshop/widgets/WSConfig", "qunit" ] , function($, Products, EShopAPI, WSConfig, QUnit) {

	var equal = QUnit.equal, notEqual = QUnit.notEqual, wsconfig, expect = QUnit.expect, test = QUnit.test, testSearchWithDiffCharacter = QUnit.test, testSearchWithSameCharacter = QUnit.test, testSearchWithEmptyKeyword = QUnit.test, testSearchWithSpclChar = QUnit.test, testSearchWithEmptySpclChar = QUnit.test, testSearchWithDiffAlphaNumChar = QUnit.test, testSearchWithSameAlphaNumChar = QUnit.test,testSearchWithAlphaNumSpclChar = QUnit.test, testSearchWithSameNumber = QUnit.test, testSearchWithDiffNumber = QUnit.test, api, output1, output2, productsobj, categoryId, searchCriteria, searchData, callback;

	/* testSearchWithSameCharacter("Test search with same characters " , function() {

		// Setup view and call method under test
		productsobj = new Products();
		api = new EShopAPI();
		wsconfig = new WSConfig();
		api.wsURL = wsconfig.WSConfigurl;
		productsobj.api = api;
		productsobj.categoryId =null;
		productsobj.searchCriteria ='domke';

		output1 = productsobj.renderUI();

		var self = this,
		mainContent = $('<div></div>'),
		topH3 = $('<h3>Products</h3>'),
		navUL = $('<ul></ul>'),
		categoryId = null,
		searchCriteria = 'domke';

		productsobj.api.searchProducts(searchCriteria, function(jsonObject){
			if(jsonObject.product !== undefined){
				var productList = jsonObject,
				i, product, innerLi, innerDiv1, innerDiv2, productNamelink,
				productPriceDiv, productButtonDiv, ahref1, ahref2, data,
				newproducts = productList.product.length;

				for (i = 0; i < newproducts; i++) {
					product = jsonObject.product[i];
					innerLi = $('<li></li>');
					innerDiv1 = $('<div class="img"><a href="javascript:void(0);"><img src="'+api.wsURLWithoutContext+'/images/web/'+product.image+'" alt=""></a></div>');
					innerDiv2 = $('<div class="info"></div>');
					productNamelink = $('<a class="title2" href="#">'+product.name+'</a>');
					productPriceDiv = $('<div class="price"><span class="st">Our price:</span><strong>$'+product.listPrice+'</strong><br><span class="st2">Sell at:</span><span class="st3">$'+product.sellPrice+'</span></div></div>');
					productButtonDiv = $('<div class="actions">');
					ahref1 = $('<a href="#">Details</a>');
					ahref2 = $('<a href="#">Add to cart</a>');
					data = {};
					data.productId = product.id;
					data.name = product.name;
					data.quantity = 1;
					data.price = product.sellPrice;
					data.image = product.image;
					data.totalPrice = (data.quantity * product.sellPrice);
					productButtonDiv.append(ahref1);
					productButtonDiv.append(ahref2);
					innerDiv2.append(productNamelink);
					innerDiv2.append(productPriceDiv);
					innerDiv2.append(productButtonDiv);
					innerLi.append(innerDiv1);
					innerLi.append(innerDiv2);
					navUL.append(innerLi);
				}
			}
		});      
		mainContent.append(topH3);     
		mainContent.append(navUL);
		output2 = mainContent.append(navUL);
		equal(output1.html(), output2.html(), "Search test case with same characters - Test case passed");
	});
	
	testSearchWithDiffCharacter("Test search with different characters " , function() {
	
		// Setup view and call method under test
		productsobj = new Products();
		api = new EShopAPI();
		wsconfig = new WSConfig();
		api.wsURL = wsconfig.WSConfigurl;
		productsobj.api = api;
		productsobj.categoryId =null;
		productsobj.searchCriteria ='domke';

		output1 = productsobj.renderUI();
		
		var self = this,
        mainContent = $('<div></div>'),
        topH3 = $('<h3>Products</h3>'),
        navUL = $('<ul></ul>'),
        categoryId = null,
        searchCriteria = 'apple';
	
		 productsobj.api.searchProducts(searchCriteria, function(jsonObject){
			if(jsonObject.product !== undefined){
				var productList = jsonObject,
				i, product, innerLi, innerDiv1, innerDiv2, productNamelink,
				productPriceDiv, productButtonDiv, ahref1, ahref2, data,
				newproducts = productList.product.length;

				for (i = 0; i < newproducts; i++) {
					product = jsonObject.product[i];
					innerLi = $('<li></li>');
					innerDiv1 = $('<div class="img"><a href="javascript:void(0);"><img src="'+api.wsURLWithoutContext+'/images/web/'+product.image+'" alt=""></a></div>');
					innerDiv2 = $('<div class="info"></div>');
					productNamelink = $('<a class="title2" href="#">'+product.name+'</a>');
					productPriceDiv = $('<div class="price"><span class="st">Our price:</span><strong>$'+product.listPrice+'</strong><br><span class="st2">Sell at:</span><span class="st3">$'+product.sellPrice+'</span></div></div>');
					productButtonDiv = $('<div class="actions">');
					ahref1 = $('<a href="#">Details</a>');
					ahref2 = $('<a href="#">Add to cart</a>');
					data = {};
					data.productId = product.id;
					data.name = product.name;
					data.quantity = 1;
					data.price = product.sellPrice;
					data.image = product.image;
					data.totalPrice = (data.quantity * product.sellPrice);
					productButtonDiv.append(ahref1);
					productButtonDiv.append(ahref2);
					innerDiv2.append(productNamelink);
					innerDiv2.append(productPriceDiv);
					innerDiv2.append(productButtonDiv);
					innerLi.append(innerDiv1);
					innerLi.append(innerDiv2);
					navUL.append(innerLi);
				}
			}	
		});      
        mainContent.append(topH3);     
        mainContent.append(navUL);
		output2 = mainContent.append(navUL);
		notEqual(output1.html(), output2.html(), "Search test case with different characters -- Test case passed");
	}); 
	
	testSearchWithEmptyKeyword("Test search with empty keyword" , function() {
	
		// Setup view and call method under test
		productsobj = new Products();
		api = new EShopAPI();
		wsconfig = new WSConfig();
		api.wsURL = wsconfig.WSConfigurl;
		productsobj.api = api;
		productsobj.categoryId =null;
		productsobj.searchCriteria ='apple';

		output1 = productsobj.renderUI();

		var self = this,
        mainContent = $('<div></div>'),
        topH3 = $('<h3>Products</h3>'),
        navUL = $('<ul></ul>'),
        categoryId = null,
        searchCriteria = ' ';
	
		 productsobj.api.searchProducts(searchCriteria, function(jsonObject){
			if(jsonObject.product !== undefined){
				var productList = jsonObject,
				i, product, innerLi, innerDiv1, innerDiv2, productNamelink,
				productPriceDiv, productButtonDiv, ahref1, ahref2, data,
				newproducts = productList.product.length;

				for (i = 0; i < newproducts; i++) {
					product = jsonObject.product[i];
					innerLi = $('<li></li>');
					innerDiv1 = $('<div class="img"><a href="javascript:void(0);"><img src="'+api.wsURLWithoutContext+'/images/web/'+product.image+'" alt=""></a></div>');
					innerDiv2 = $('<div class="info"></div>');
					productNamelink = $('<a class="title2" href="#">'+product.name+'</a>');
					productPriceDiv = $('<div class="price"><span class="st">Our price:</span><strong>$'+product.listPrice+'</strong><br><span class="st2">Sell at:</span><span class="st3">$'+product.sellPrice+'</span></div></div>');
					productButtonDiv = $('<div class="actions">');
					ahref1 = $('<a href="#">Details</a>');
					ahref2 = $('<a href="#">Add to cart</a>');
					data = {};
					data.productId = product.id;
					data.name = product.name;
					data.quantity = 1;
					data.price = product.sellPrice;
					data.image = product.image;
					data.totalPrice = (data.quantity * product.sellPrice);
					productButtonDiv.append(ahref1);
					productButtonDiv.append(ahref2);
					innerDiv2.append(productNamelink);
					innerDiv2.append(productPriceDiv);
					innerDiv2.append(productButtonDiv);
					innerLi.append(innerDiv1);
					innerLi.append(innerDiv2);
					navUL.append(innerLi);
				}
			}
		});      
        mainContent.append(topH3);     
        mainContent.append(navUL);
		output2 = mainContent.append(navUL);
		notEqual(output1.html(), output2.html(), "Search test case with empty keyword - Test case passed");
	});
	
	testSearchWithSpclChar("Test search with Special Character" , function() {
	
		// Setup view and call method under test
		productsobj = new Products();
		api = new EShopAPI();
		wsconfig = new WSConfig();
		api.wsURL = wsconfig.WSConfigurl;
		productsobj.api = api;
		productsobj.categoryId =null;
		productsobj.searchCriteria ='domke';

		output1 = productsobj.renderUI();

		var self = this,
        mainContent = $('<div></div>'),
        topH3 = $('<h3>Products</h3>'),
        navUL = $('<ul></ul>'),
        categoryId = null,
        searchCriteria = '&&@';
	
		 productsobj.api.searchProducts(searchCriteria, function(jsonObject){
			if(jsonObject.product !== undefined){
				var productList = jsonObject,
				i, product, innerLi, innerDiv1, innerDiv2, productNamelink,
				productPriceDiv, productButtonDiv, ahref1, ahref2, data,
				newproducts = productList.product.length;

				for (i = 0; i < newproducts; i++) {
					product = jsonObject.product[i];
					innerLi = $('<li></li>');
					innerDiv1 = $('<div class="img"><a href="javascript:void(0);"><img src="'+api.wsURLWithoutContext+'/images/web/'+product.image+'" alt=""></a></div>');
					innerDiv2 = $('<div class="info"></div>');
					productNamelink = $('<a class="title2" href="#">'+product.name+'</a>');
					productPriceDiv = $('<div class="price"><span class="st">Our price:</span><strong>$'+product.listPrice+'</strong><br><span class="st2">Sell at:</span><span class="st3">$'+product.sellPrice+'</span></div></div>');
					productButtonDiv = $('<div class="actions">');
					ahref1 = $('<a href="#">Details</a>');
					ahref2 = $('<a href="#">Add to cart</a>');
					data = {};
					data.productId = product.id;
					data.name = product.name;
					data.quantity = 1;
					data.price = product.sellPrice;
					data.image = product.image;
					data.totalPrice = (data.quantity * product.sellPrice);
					productButtonDiv.append(ahref1);
					productButtonDiv.append(ahref2);
					innerDiv2.append(productNamelink);
					innerDiv2.append(productPriceDiv);
					innerDiv2.append(productButtonDiv);
					innerLi.append(innerDiv1);
					innerLi.append(innerDiv2);
					navUL.append(innerLi);
				}
			}
		});      
        mainContent.append(topH3);     
        mainContent.append(navUL);
		output2 = mainContent.append(navUL);
		notEqual(output1.html(), output2.html(), "Search test case with special characters - Test case passed");
	}); */
	
	testSearchWithEmptySpclChar("Test search with empty & special characters" , function() {
	
		// Setup view and call method under test
		productsobj = new Products();
		api = new EShopAPI();
		wsconfig = new WSConfig();
		api.wsURL = wsconfig.WSConfigurl;
		productsobj.api = api;
		productsobj.categoryId =null;
		productsobj.searchCriteria ='';

		output1 = productsobj.renderUI();

		var self = this,
        mainContent = $('<div></div>'),
        topH3 = $('<h3>Products</h3>'),
        navUL = $('<ul></ul>'),
        categoryId = null,
        searchCriteria = '&&@';
	
		 productsobj.api.searchProducts(searchCriteria, function(jsonObject){
         console.info("jsonObject",jsonObject);
			if(jsonObject.product !== undefined){
				var productList = jsonObject,
				i, product, innerLi, innerDiv1, innerDiv2, productNamelink,
				productPriceDiv, productButtonDiv, ahref1, ahref2, data,
				newproducts = productList.product.length;

				for (i = 0; i < newproducts; i++) {
					product = jsonObject.product[i];
					innerLi = $('<li></li>');
					innerDiv1 = $('<div class="img"><a href="javascript:void(0);"><img src="'+api.wsURLWithoutContext+'/images/web/'+product.image+'" alt=""></a></div>');
					innerDiv2 = $('<div class="info"></div>');
					productNamelink = $('<a class="title2" href="#">'+product.name+'</a>');
					productPriceDiv = $('<div class="price"><span class="st">Our price:</span><strong>$'+product.listPrice+'</strong><br><span class="st2">Sell at:</span><span class="st3">$'+product.sellPrice+'</span></div></div>');
					productButtonDiv = $('<div class="actions">');
					ahref1 = $('<a href="#">Details</a>');
					ahref2 = $('<a href="#">Add to cart</a>');
					data = {};
					data.productId = product.id;
					data.name = product.name;
					data.quantity = 1;
					data.price = product.sellPrice;
					data.image = product.image;
					data.totalPrice = (data.quantity * product.sellPrice);
					productButtonDiv.append(ahref1);
					productButtonDiv.append(ahref2);
					innerDiv2.append(productNamelink);
					innerDiv2.append(productPriceDiv);
					innerDiv2.append(productButtonDiv);
					innerLi.append(innerDiv1);
					innerLi.append(innerDiv2);
					navUL.append(innerLi);
				}
			}
		});      
        mainContent.append(topH3);     
        mainContent.append(navUL);
		output2 = mainContent.append(navUL);
		equal(output1.html(), output2.html(), "Search test case with empty & special characters - Test case passed");
	});
	
	/* testSearchWithSameAlphaNumChar("Test search with Same Alphanumeric Characters " , function() {
	
		// Setup view and call method under test
		productsobj = new Products();
		api = new EShopAPI();
		wsconfig = new WSConfig();
		api.wsURL = wsconfig.WSConfigurl;
		productsobj.api = api;
		productsobj.categoryId =null;
		productsobj.searchCriteria ='3d';

		output1 = productsobj.renderUI();

		var self = this,
        mainContent = $('<div></div>'),
        topH3 = $('<h3>Products</h3>'),
        navUL = $('<ul></ul>'),
        categoryId = null,
        searchCriteria = '3d';
	
		 productsobj.api.searchProducts(searchCriteria, function(jsonObject){
			if(jsonObject.product !== undefined){
				var productList = jsonObject,
				i, product, innerLi, innerDiv1, innerDiv2, productNamelink,
				productPriceDiv, productButtonDiv, ahref1, ahref2, data,
				newproducts = productList.product.length;

				for (i = 0; i < newproducts; i++) {
					product = jsonObject.product[i];
					innerLi = $('<li></li>');
					innerDiv1 = $('<div class="img"><a href="javascript:void(0);"><img src="'+api.wsURLWithoutContext+'/images/web/'+product.image+'" alt=""></a></div>');
					innerDiv2 = $('<div class="info"></div>');
					productNamelink = $('<a class="title2" href="#">'+product.name+'</a>');
					productPriceDiv = $('<div class="price"><span class="st">Our price:</span><strong>$'+product.listPrice+'</strong><br><span class="st2">Sell at:</span><span class="st3">$'+product.sellPrice+'</span></div></div>');
					productButtonDiv = $('<div class="actions">');
					ahref1 = $('<a href="#">Details</a>');
					ahref2 = $('<a href="#">Add to cart</a>');
					data = {};
					data.productId = product.id;
					data.name = product.name;
					data.quantity = 1;
					data.price = product.sellPrice;
					data.image = product.image;
					data.totalPrice = (data.quantity * product.sellPrice);
					productButtonDiv.append(ahref1);
					productButtonDiv.append(ahref2);
					innerDiv2.append(productNamelink);
					innerDiv2.append(productPriceDiv);
					innerDiv2.append(productButtonDiv);
					innerLi.append(innerDiv1);
					innerLi.append(innerDiv2);
					navUL.append(innerLi);
				}
			}
		});      
        mainContent.append(topH3);     
        mainContent.append(navUL);
		output2 = mainContent.append(navUL);
		equal(output1.html(), output2.html(), "Search test case with same Alphanumeric characters - Test case passed");
	});
	
	testSearchWithDiffAlphaNumChar("Test search with different Alphanumeric Characters " , function() {
	
		// Setup view and call method under test
		productsobj = new Products();
		api = new EShopAPI();
		wsconfig = new WSConfig();
		api.wsURL = wsconfig.WSConfigurl;
		productsobj.api = api;
		productsobj.categoryId =null;
		productsobj.searchCriteria ='3d';

		output1 = productsobj.renderUI();

		var self = this,
        mainContent = $('<div></div>'),
        topH3 = $('<h3>Products</h3>'),
        navUL = $('<ul></ul>'),
        categoryId = null,
        searchCriteria = '1233d';
	
		 productsobj.api.searchProducts(searchCriteria, function(jsonObject){
			if(jsonObject.product !== undefined){
				var productList = jsonObject,
				i, product, innerLi, innerDiv1, innerDiv2, productNamelink,
				productPriceDiv, productButtonDiv, ahref1, ahref2, data,
				newproducts = productList.product.length;

				for (i = 0; i < newproducts; i++) {
					product = jsonObject.product[i];
					innerLi = $('<li></li>');
					innerDiv1 = $('<div class="img"><a href="javascript:void(0);"><img src="'+api.wsURLWithoutContext+'/images/web/'+product.image+'" alt=""></a></div>');
					innerDiv2 = $('<div class="info"></div>');
					productNamelink = $('<a class="title2" href="#">'+product.name+'</a>');
					productPriceDiv = $('<div class="price"><span class="st">Our price:</span><strong>$'+product.listPrice+'</strong><br><span class="st2">Sell at:</span><span class="st3">$'+product.sellPrice+'</span></div></div>');
					productButtonDiv = $('<div class="actions">');
					ahref1 = $('<a href="#">Details</a>');
					ahref2 = $('<a href="#">Add to cart</a>');
					data = {};
					data.productId = product.id;
					data.name = product.name;
					data.quantity = 1;
					data.price = product.sellPrice;
					data.image = product.image;
					data.totalPrice = (data.quantity * product.sellPrice);
					productButtonDiv.append(ahref1);
					productButtonDiv.append(ahref2);
					innerDiv2.append(productNamelink);
					innerDiv2.append(productPriceDiv);
					innerDiv2.append(productButtonDiv);
					innerLi.append(innerDiv1);
					innerLi.append(innerDiv2);
					navUL.append(innerLi);
				}
			}
		});      
        mainContent.append(topH3);     
        mainContent.append(navUL);
		output2 = mainContent.append(navUL);
		notEqual(output1.html(), output2.html(), "Search test case with different Alphanumeric characters - Test case passed");
	});
	
	testSearchWithAlphaNumSpclChar("Test search with Alphanumeric & special characters " , function() {
	
		// Setup view and call method under test
		productsobj = new Products();
		api = new EShopAPI();
		wsconfig = new WSConfig();
		api.wsURL = wsconfig.WSConfigurl;
		productsobj.api = api;
		productsobj.categoryId =null;
		productsobj.searchCriteria ='domke';

		output1 = productsobj.renderUI();

		var self = this,
        mainContent = $('<div></div>'),
        topH3 = $('<h3>Products</h3>'),
        navUL = $('<ul></ul>'),
        categoryId = null,
        searchCriteria = 'domke12!@#';
	
		 productsobj.api.searchProducts(searchCriteria, function(jsonObject){
			if(jsonObject.product !== undefined){
				var productList = jsonObject,
				i, product, innerLi, innerDiv1, innerDiv2, productNamelink,
				productPriceDiv, productButtonDiv, ahref1, ahref2, data,
				newproducts = productList.product.length;

				for (i = 0; i < newproducts; i++) {
					product = jsonObject.product[i];
					innerLi = $('<li></li>');
					innerDiv1 = $('<div class="img"><a href="javascript:void(0);"><img src="'+api.wsURLWithoutContext+'/images/web/'+product.image+'" alt=""></a></div>');
					innerDiv2 = $('<div class="info"></div>');
					productNamelink = $('<a class="title2" href="#">'+product.name+'</a>');
					productPriceDiv = $('<div class="price"><span class="st">Our price:</span><strong>$'+product.listPrice+'</strong><br><span class="st2">Sell at:</span><span class="st3">$'+product.sellPrice+'</span></div></div>');
					productButtonDiv = $('<div class="actions">');
					ahref1 = $('<a href="#">Details</a>');
					ahref2 = $('<a href="#">Add to cart</a>');
					data = {};
					data.productId = product.id;
					data.name = product.name;
					data.quantity = 1;
					data.price = product.sellPrice;
					data.image = product.image;
					data.totalPrice = (data.quantity * product.sellPrice);
					productButtonDiv.append(ahref1);
					productButtonDiv.append(ahref2);
					innerDiv2.append(productNamelink);
					innerDiv2.append(productPriceDiv);
					innerDiv2.append(productButtonDiv);
					innerLi.append(innerDiv1);
					innerLi.append(innerDiv2);
					navUL.append(innerLi);
				}
			}
		});      
        mainContent.append(topH3);     
        mainContent.append(navUL);
		output2 = mainContent.append(navUL);
		notEqual(output1.html(), output2.html(), "Search test case with Alphanumeric & special characters - Test case passed");
	});
	
	testSearchWithSameNumber("Test search with same numbers as keyword" , function() {
	
		// Setup view and call method under test
		productsobj = new Products();
		api = new EShopAPI();
		wsconfig = new WSConfig();
		api.wsURL = wsconfig.WSConfigurl;
		productsobj.api = api;
		productsobj.categoryId =null;
		productsobj.searchCriteria ='3';

		output1 = productsobj.renderUI();

		var self = this,
        mainContent = $('<div></div>'),
        topH3 = $('<h3>Products</h3>'),
        navUL = $('<ul></ul>'),
        categoryId = null,
        searchCriteria = '3';
	
		 productsobj.api.searchProducts(searchCriteria, function(jsonObject){
			if(jsonObject.product !== undefined){
				var productList = jsonObject,
				i, product, innerLi, innerDiv1, innerDiv2, productNamelink,
				productPriceDiv, productButtonDiv, ahref1, ahref2, data,
				newproducts = productList.product.length;

				for (i = 0; i < newproducts; i++) {
					product = jsonObject.product[i];
					innerLi = $('<li></li>');
					innerDiv1 = $('<div class="img"><a href="javascript:void(0);"><img src="'+api.wsURLWithoutContext+'/images/web/'+product.image+'" alt=""></a></div>');
					innerDiv2 = $('<div class="info"></div>');
					productNamelink = $('<a class="title2" href="#">'+product.name+'</a>');
					productPriceDiv = $('<div class="price"><span class="st">Our price:</span><strong>$'+product.listPrice+'</strong><br><span class="st2">Sell at:</span><span class="st3">$'+product.sellPrice+'</span></div></div>');
					productButtonDiv = $('<div class="actions">');
					ahref1 = $('<a href="#">Details</a>');
					ahref2 = $('<a href="#">Add to cart</a>');
					data = {};
					data.productId = product.id;
					data.name = product.name;
					data.quantity = 1;
					data.price = product.sellPrice;
					data.image = product.image;
					data.totalPrice = (data.quantity * product.sellPrice);
					productButtonDiv.append(ahref1);
					productButtonDiv.append(ahref2);
					innerDiv2.append(productNamelink);
					innerDiv2.append(productPriceDiv);
					innerDiv2.append(productButtonDiv);
					innerLi.append(innerDiv1);
					innerLi.append(innerDiv2);
					navUL.append(innerLi);
				}
			}
		});      
        mainContent.append(topH3);     
        mainContent.append(navUL);
		output2 = mainContent.append(navUL);
		equal(output1.html(), output2.html(), "Search test case with same numbers as keyword - Test case passed");
	});
	
	testSearchWithDiffNumber("Test search with different numbers as keyword" , function() {
	
		// Setup view and call method under test
		productsobj = new Products();
		api = new EShopAPI();
		wsconfig = new WSConfig();
		api.wsURL = wsconfig.WSConfigurl;
		productsobj.api = api;
		productsobj.categoryId =null;
		productsobj.searchCriteria ='1';

		output1 = productsobj.renderUI();

		var self = this,
        mainContent = $('<div></div>'),
        topH3 = $('<h3>Products</h3>'),
        navUL = $('<ul></ul>'),
        categoryId = null,
        searchCriteria = '3';
	
		 productsobj.api.searchProducts(searchCriteria, function(jsonObject){
			if(jsonObject.product !== undefined){
				var productList = jsonObject,
				i, product, innerLi, innerDiv1, innerDiv2, productNamelink,
				productPriceDiv, productButtonDiv, ahref1, ahref2, data,
				newproducts = productList.product.length;

				for (i = 0; i < newproducts; i++) {
					product = jsonObject.product[i];
					innerLi = $('<li></li>');
					innerDiv1 = $('<div class="img"><a href="javascript:void(0);"><img src="'+api.wsURLWithoutContext+'/images/web/'+product.image+'" alt=""></a></div>');
					innerDiv2 = $('<div class="info"></div>');
					productNamelink = $('<a class="title2" href="#">'+product.name+'</a>');
					productPriceDiv = $('<div class="price"><span class="st">Our price:</span><strong>$'+product.listPrice+'</strong><br><span class="st2">Sell at:</span><span class="st3">$'+product.sellPrice+'</span></div></div>');
					productButtonDiv = $('<div class="actions">');
					ahref1 = $('<a href="#">Details</a>');
					ahref2 = $('<a href="#">Add to cart</a>');
					data = {};
					data.productId = product.id;
					data.name = product.name;
					data.quantity = 1;
					data.price = product.sellPrice;
					data.image = product.image;
					data.totalPrice = (data.quantity * product.sellPrice);
					productButtonDiv.append(ahref1);
					productButtonDiv.append(ahref2);
					innerDiv2.append(productNamelink);
					innerDiv2.append(productPriceDiv);
					innerDiv2.append(productButtonDiv);
					innerLi.append(innerDiv1);
					innerLi.append(innerDiv2);
					navUL.append(innerLi);
				}
			}
		});      
        mainContent.append(topH3);     
        mainContent.append(navUL);
		output2 = mainContent.append(navUL);
		notEqual(output1.html(), output2.html(), "Search test case with different numbers as keyword - Test case passed");
	}); */
});