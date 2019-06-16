var WebStore = {
  
  created: false, 
  dialog: null, 
  itemsDiv: null, 
  tabList: null,
  selectedItem: null, 
  selectedCategory: null, 
  selectedSubCategory: null, 
  selectedTab: null, 
  loadingCategory: false, 
  previewItemPointer: 0, 
  previewItems: null, 
  originalBg: null,
  storeOpened: false,
  backgroundPreviewWarning: false, 
  localization: null, 
  
  open: function(tab) {
    if (!WebStore.created) {
      WebStore._create();
      WebStore._loadMainContent(tab);
    } else {
      WebStore._selectTab(tab);
    }
    
    WebStore.originalBg = $("mypage-bg").className;
    
    WebStore.dialog.show();
	showOverlay();
	moveDialogToCenter(WebStore.dialog);
  }, 
  
  close: function() {
    WebStore.dialog.style.left = "-1500px";
    WebStore.dialog.hide();
    Overlay.hide();
    
    WebStore.Inventory.newItems = [];
    WebStore.Inventory.updateNewItemCount(10);
    
    $("mypage-bg").className = WebStore.originalBg;
    
    WebStore.loadingCategory = false;
    WebStore.Inventory.loadingCategory = false;
  }, 
  

  

  
  _create: function() {
	  
    this.dialog = createDialog("purchase_dialog", "", "9003", 0, -1000,closePurchase,'<ul id="webstore-tabs" class="box-tabs"><li id="webstore-inventory" class=""><a href="#">Inventory <span id="webstore-inventory-new" class=""></span></a></li><li id="webstore-store" class=""><a href="#">Web Store</a></li></ul>');
		
  },  
  _loadMainContent: function(tab) {
    if (tab == "webstore-inventory") {
	  $(tab).className = "selected";
	  appendDialogBody(this.dialog, "<p style=\"text-align:center\"><img src=\""+habboStaticFilePath+"/images/progress_habbos.gif\" alt=\"\" /></p><div style=\"clear\"></div>", true);
	 // setDialogBody(this.dialog, '<div id="purchase-main-dialog-body" class="topdialog-body"><div style="position: relative;"><div id="inventory-categories-container" style="display: block;"></div></div></div>');	
    } else {
	  $(tab).className = "selected";
	  appendDialogBody(this.dialog, "<p style=\"text-align:center\"><img src=\""+habboStaticFilePath+"/images/progress_habbos.gif\" alt=\"\" /></p><div style=\"clear\"></div>", true);
	  //setDialogBody(this.dialog, "Webstore ~ Beta Preview only for Test");	

    }
  }, 
  _selectTab: function(id) {
	  
    if (WebStore.selectedTab) { $(WebStore.selectedTab).className = ""; }
    $(id).className = "selected";
    WebStore.selectedTab = id;
    var header = $$("#purchase-main-dialog h3 span").first();
    
    if (id == "webstore-store") {
      if (header && WebStore.localization) { header.innerHTML = WebStore.localization[1]; }
      
      var type = "_webstore";
      if (WebStore.MenuBar.selectedMainCategory != null) {
        type = WebStore.MenuBar.selectedMainCategory.id.split("-").last();
      }
      WebStore.Inventory.hideInventoryDivs();
      
      WebStore._setDialogSize(type, function() {
        if (!WebStore.storeOpened) {
          WebStore._loadSubCategory(WebStore.selectedCategory, WebStore.selectedSubCategory);
          WebStore.storeOpened = true;
        }
        
        WebStore.showWebStoreDivs();
      });
    } else {
      if (header && WebStore.localization) { header.innerHTML = WebStore.localization[0]; }
      
      WebStore.hideWebStoreDivs();
      
      WebStore._setDialogSize("_inventory", function() {
        WebStore.Inventory.showInventoryDivs();
        
        if (!WebStore.Inventory.inventoryOpened) {
          WebStore.Inventory.loadCategory("stickers");
          WebStore.Inventory.inventoryOpened = true;
        }
        
        // reset counter
        WebStore.Inventory.newItems = [];
        WebStore.Inventory.updateNewItemCount();
        
        WebStore.Inventory.reloadIfNeeded();
      });
    }
  }, 

  
 
  

  

 
};



ScriptLoader.notify("myhabbo-store");