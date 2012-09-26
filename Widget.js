/*global define, window */

define( "framework/Widget", [ "jquery", "framework/Clazz", "framework/Base" ], function($, Clazz, Base) {
    
    function Widget() {
    }

    Widget.prototype = new Base();
    Widget.prototype = new Widget();

    /***
     * A call to render the UI fragment implemented in renderUI method
     * @param whereToRender A placeholder to hold the fragment, this would typically
     * be a div tag or other valid HTML element. 
     */
    Widget.prototype.render = function(whereToRender) {
        // call renderUI to get the element
        var fragment = this.renderUI();
        
        // get the placement using jQuery
        // and embed it 
        $(whereToRender).html(fragment);
        
        // bind all elements once rendered to provide events
        this.bindUI();
    };
    
    /**
     * Function that every subclass needs to override to provide
     * a fragment that render will call
     */
    Widget.prototype.renderUI = function() {
    };
    
    /****
     * Bind the UI elements with appropriate events
     */
    Widget.prototype.bindUI = function() {
    };

    return Widget;
});
