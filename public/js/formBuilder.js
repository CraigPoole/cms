var buttonJson = ['{"text" : "Button"}','{"text": "Date"}'];

function formBuilder(element){

    this.element = $('#'+element);
    this.row;
    this.toolbar;
    this.canvas;
    this.table;


    this.init = function () {
        console.log(this.element);
        this.addTable();
        this.addCanvas();
        this.addToolbar();
        this.addButtons();
    };

    this.addTable = function () {
        this.element.addClass("fbTable");
        this.row = $('<div class="fbRow"></div>');
        this.element.append(this.row);
    };

    this.addCanvas = function () {
        this.canvas = $('<div class="canvas"></div>');
        this.table = $('<div  class="fbTable sortable"></div>');
        this.canvas.append(this.table);
        this.row.append(this.canvas);
    };

    this.addToolbar = function () {
        this.row.append('<div class="gap"></div>');
        this.toolbar = $('<div class="toolbar"></div>');
        this.row.append(this.toolbar);
    };

    this.addButtons = function () {

        for(var cnt = 0; cnt < buttonJson.length; cnt++)
        {
            var button = new formWidget(buttonJson[cnt],this.table);
            this.toolbar.append(button.render());
        }

    };



    this.init();
}

function formWidget(data,canvas) {

    this.data = $.parseJSON(data);
    this.canvas = canvas;
    this.button;

    var self = this;

    this.init = function () {
        this.button = $('<button class="fbWidget">'+this.data.text+'</button>');
        this.button.click(this.clicked);
    };

    this.render = function () {
        return this.button;
    };

    this.clicked = function () {
        self.canvas.append('<div class="fbElement"><input type="text"/></div>');
        $( '.sortable').sortable();
        $( '.sortable' ).disableSelection();
    };


    this.init();
}