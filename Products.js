/*global define, $, window */

define( "eshop/widgets/Products", [ "jquery", "framework/Clazz", "framework/Widget" ], function($, Clazz, Widget) {

    function Products() {
    }

    Products.prototype = new Clazz();    
    Products.prototype = new Widget(); 

    Products.prototype.mainNode = undefined;
    Products.prototype.mainContent = undefined;
    Products.prototype.categoryId = undefined;
    Products.prototype.mainContent = undefined;
    Products.prototype.hideItms = undefined;
    Products.prototype.searchCriteria = undefined;
    Products.prototype.phrescoapi = undefined;
    Products.prototype.listener = undefined;
    Products.prototype.api = undefined;

    Products.prototype.initialize = function(container, listener, phrescoapi, api) {
        listener.subscribe("Products",this,"onHashChange");
        this.listener = listener;
        this.mainNode = container;
        this.phrescoapi = phrescoapi;
        this.hideItms = [];
        this.api = api; 
    };

    Products.prototype.setMainContent = function() {
        var self = this,
        mainContent = $('<div></div>'),
        topH3 = $('<h3>Products</h3>'),
        navUL = $('<ul></ul>'),
        categoryId = this.categoryId,
        searchCriteria = this.searchCriteria;

        if(categoryId === undefined || categoryId === null) {
            categoryId = 1;
        } else if(categoryId === 'All Products') {
            topH3 = $('<h3>' + categoryId + '</h3>');
        } else if(categoryId === 'Special Products') {
            topH3 = $('<h3>' + categoryId + '</h3>');
        }

        if (searchCriteria === undefined || searchCriteria === null) {
            self.api.getAllProducts(categoryId,function(jsonObject){
                self.constructProductUI(jsonObject, navUL,categoryId, self); 
            });   
        } else {
            self.api.searchProducts(searchCriteria, function(jsonObject){
                self.constructProductUI(jsonObject, navUL,categoryId, self); 
            });      
        }

        mainContent.append(topH3);  
        mainContent.append(navUL);
        this.mainContent = mainContent;
    };

    Products.prototype.renderUI = function() {
        this.setMainContent();
        return this.mainContent;
    };
    
    Products.prototype.onHashChange = function(event,data) {
        this.categoryId = data.categoryId;
        this.searchCriteria = data.searchCriteria;
        this.render(this.mainNode);
		this.mainNode.show();
    };

    Products.prototype.hideWidget = function(){
        this.mainNode.hide();
    };

    Products.prototype.addFunction = function(ahref1, ahref2, productNamelink, innerDiv1, self, categoryId, data){
        $(ahref1).bind('click', {productId : data.productId} , function(event){
            self.hideItems = ['Products'];
            self.phrescoapi.hideWidget(self.hideItems);
            self.listener.publish(event,"ProductDetails",[event.data]);
        });
        $(productNamelink).bind('click', {productId : data.productId} , function(event){
            self.hideItems = ['Products'];
            self.phrescoapi.hideWidget(self.hideItems);
            self.listener.publish(event,"ProductDetails",[event.data]);
        });
        $(innerDiv1).bind('click', {productId : data.productId} , function(event){
            self.hideItems = ['Products'];
            self.phrescoapi.hideWidget(self.hideItems);
            self.listener.publish(event,"ProductDetails",[event.data]);
        });

        $(ahref2).bind('click', data , function(event){
            self.phrescoapi.showShoppingCart(event.data);
            self.hideItems = ['Products','Login'];
            self.phrescoapi.hideWidget(self.hideItems);
            var dataItem = {productArray : self.phrescoapi.productArray, categoryID : categoryId, productID : null};
            self.listener.publish(event,"ShoppingCart",dataItem);
            self.listener.publish(event,"MyCart",[self.phrescoapi.productArray]);
        });
    };

    Products.prototype.constructProductUI = function(jsonObject, navUL,categoryId, self) {
        var productList = jsonObject,
        i, product, innerLi, innerDiv1, innerDiv2, productNamelink,
        productPriceDiv, productButtonDiv, ahref1, ahref2, data, newproducts;
		if(productList.product !== undefined){
			newproducts = productList.product.length;
			for (i = 0; i < newproducts; i++) {
				product = jsonObject.product[i];
				innerLi = $('<li></li>');
				innerDiv1 = $('<div class="img"><a href="javascript:void(0);"><img src="'+this.api.wsURLWithoutContext+'/images/web/'+product.image+'" alt=""></a></div>');
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
				self.addFunction(ahref1, ahref2, productNamelink, innerDiv1, self, categoryId, data);
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
		else{
			navUL.append('<div style="text-align:center; padding:20px; font-size: 20px;">There is no product</div>');
		}
    };
    return Products;
});
