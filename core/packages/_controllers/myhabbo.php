<?php
//////////////////////////////////////////////////////////////
//						  RetroCMS							//
//<<<<<<<<<<<<<< The Oldschool Era is Back >>>>>>>>>>>>>>>>>//
//----------------------------------------------------------//
// Developed by: Marcos [ aka: m.tiago ]					//				
// Development Thread: goo.gl/nwzdZo						//
//////////////////////////////////////////////////////////////
// Beta Version 0.9.0 ( Aquamarine ) 					    //
// Branch: Public (Unstable)								//
// Compatibility Version(s): [r14,r15,r16,r17]				//
//////////////////////////////////////////////////////////////

// Class: Ajax
// Desc: Generic Ajax Request

class MyHabbo extends ControllerTemplate{
	
	/* Construct Method */
	public function __construct($hotelConection){
		//Setting PDO Conection
		$this->hotelConection = $hotelConection;
		
		//Generic Models
		$this->hotelModel = new hotelModel($this->hotelConection);
		$this->habboModel = new habboModel($this->hotelConection);
		
		//Get Hotel Object
		$this->hotel = $this->hotelModel->get_HotelObject();

		//New Habbo Object
		$this->habbo = new Habbo();
		//If Logged In
		if($this->habboModel->get_SessionStatus($this->habbo->get_habboSession())){
			$this->habbo = $this->habboModel->get_HabboObject($this->habbo->get_HabboId(),1);
			$this->habbo->set_isHabboLoggedIn(true);
		}else{
			$this->habbo->set_isHabboLoggedIn(false);
		}
		
	}
	
	/* Default View Call */
	protected function store(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if($this->habbo->get_isHabboLoggedIn()){
				   header('X-JSON: [["Inventory", "Webstore"], []]');
				   echo '
				   <div id="purchase-main-dialog-body" class="topdialog-body"><div style="position: relative;">
<div id="webstore-categories-container" style="display: none;">
	<h4>Categories:</h4>
	<div id="webstore-categories">
<ul class="purchase-main-category">
		<li id="maincategory-1-stickers" class="selected-main-category webstore-selected-main">
			<div>Stickers</div>
			<ul class="purchase-subcategory-list" id="main-category-items-1">
				
				
					<li id="subcategory-1-470-stickers" class="subcategory-selected">
						<div>Advertisments</div>
					</li>
				
				
				
					<li id="subcategory-1-452-stickers" class="subcategory">
						<div>Alhambra</div>
					</li>
				
				
				
					<li id="subcategory-1-182-stickers" class="subcategory">
						<div>Alphabet Bling</div>
					</li>
				
				
				
					<li id="subcategory-1-480-stickers" class="subcategory">
						<div>Alphabet Diner Blue</div>
					</li>
				
				
				
					<li id="subcategory-1-483-stickers" class="subcategory">
						<div>Alphabet Diner Green</div>
					</li>
				
				
				
					<li id="subcategory-1-485-stickers" class="subcategory">
						<div>Alphabet Diner Red</div>
					</li>
				
				
				
					<li id="subcategory-1-394-stickers" class="subcategory">
						<div>Alphabet Plastic</div>
					</li>
				
				
				
					<li id="subcategory-1-486-stickers" class="subcategory">
						<div>Alphabet Wood</div>
					</li>
				
				
				
					<li id="subcategory-1-454-stickers" class="subcategory">
						<div>Appart 732</div>
					</li>
				
				
				
					<li id="subcategory-1-453-stickers" class="subcategory">
						<div>Avatars</div>
					</li>
				
				
				
					<li id="subcategory-1-457-stickers" class="subcategory">
						<div>Banks</div>
					</li>
				
				
				
					<li id="subcategory-1-481-stickers" class="subcategory">
						<div>Batman Darknight</div>
					</li>
				
				
				
					<li id="subcategory-1-446-stickers" class="subcategory">
						<div>Battle Ball</div>
					</li>
				
				
				
					<li id="subcategory-1-461-stickers" class="subcategory">
						<div>Beach</div>
					</li>
				
				
				
					<li id="subcategory-1-138-stickers" class="subcategory">
						<div>Borders</div>
					</li>
				
				
				
					<li id="subcategory-1-451-stickers" class="subcategory">
						<div>Buttons</div>
					</li>
				
				
				
					<li id="subcategory-1-468-stickers" class="subcategory">
						<div>Celebration</div>
					</li>
				
				
				
					<li id="subcategory-1-466-stickers" class="subcategory">
						<div>China</div>
					</li>
				
				
				
					<li id="subcategory-1-459-stickers" class="subcategory">
						<div>Costume</div>
					</li>
				
				
				
					<li id="subcategory-1-171-stickers" class="subcategory">
						<div>Cute</div>
					</li>
				
				
				
					<li id="subcategory-1-444-stickers" class="subcategory">
						<div>Deals</div>
					</li>
				
				
				
					<li id="subcategory-1-482-stickers" class="subcategory">
						<div>Diner</div>
					</li>
				
				
				
					<li id="subcategory-1-462-stickers" class="subcategory">
						<div>Easter</div>
					</li>
				
				
				
					<li id="subcategory-1-443-stickers" class="subcategory">
						<div>FX</div>
					</li>
				
				
				
					<li id="subcategory-1-106-stickers" class="subcategory">
						<div>Flags</div>
					</li>
				
				
				
					<li id="subcategory-1-456-stickers" class="subcategory">
						<div>Football</div>
					</li>
				
				
				
					<li id="subcategory-1-467-stickers" class="subcategory">
						<div>Habbowood</div>
					</li>
				
				
				
					<li id="subcategory-1-488-stickers" class="subcategory">
						<div>Halloween</div>
					</li>
				
				
				
					<li id="subcategory-1-469-stickers" class="subcategory">
						<div>Highlighter</div>
					</li>
				
				
				
					<li id="subcategory-1-491-stickers" class="subcategory">
						<div>Hockey</div>
					</li>
				
				
				
					<li id="subcategory-1-471-stickers" class="subcategory">
						<div>Inked</div>
					</li>
				
				
				
					<li id="subcategory-1-476-stickers" class="subcategory">
						<div>Japanese</div>
					</li>
				
				
				
					<li id="subcategory-1-475-stickers" class="subcategory">
						<div>Keep It Real (NOT!)</div>
					</li>
				
				
				
					<li id="subcategory-1-490-stickers" class="subcategory">
						<div>Money</div>
					</li>
				
				
				
					<li id="subcategory-1-449-stickers" class="subcategory">
						<div>OB</div>
					</li>
				
				
				
					<li id="subcategory-1-130-stickers" class="subcategory">
						<div>Others</div>
					</li>
				
				
				
					<li id="subcategory-1-465-stickers" class="subcategory">
						<div>Paper Mario</div>
					</li>
				
				
				
					<li id="subcategory-1-270-stickers" class="subcategory">
						<div>Pointers</div>
					</li>
				
				
				
					<li id="subcategory-1-472-stickers" class="subcategory">
						<div>Prices</div>
					</li>
				
				
				
					<li id="subcategory-1-107-stickers" class="subcategory">
						<div>Promos</div>
					</li>
				
				
				
					<li id="subcategory-1-492-stickers" class="subcategory">
						<div>Rock</div>
					</li>
				
				
				
					<li id="subcategory-1-109-stickers" class="subcategory">
						<div>Safe Internet Day</div>
					</li>
				
				
				
					<li id="subcategory-1-487-stickers" class="subcategory">
						<div>Sea</div>
					</li>
				
				
				
					<li id="subcategory-1-479-stickers" class="subcategory">
						<div>Sparkle</div>
					</li>
				
				
				
					<li id="subcategory-1-442-stickers" class="subcategory">
						<div>Spring</div>
					</li>
				
				
				
					<li id="subcategory-1-484-stickers" class="subcategory">
						<div>St Patrick</div>
					</li>
				
				
				
					<li id="subcategory-1-458-stickers" class="subcategory">
						<div>Summer</div>
					</li>
				
				
				
					<li id="subcategory-1-473-stickers" class="subcategory">
						<div>Tiki</div>
					</li>
				
				
				
					<li id="subcategory-1-102-stickers" class="subcategory">
						<div>Trax</div>
					</li>
				
				
				
					<li id="subcategory-1-489-stickers" class="subcategory">
						<div>Velentine</div>
					</li>
				
				
				
					<li id="subcategory-1-460-stickers" class="subcategory">
						<div>WWE</div>
					</li>
				
				
				
					<li id="subcategory-1-445-stickers" class="subcategory">
						<div>Winter</div>
					</li>
				
				
				
					<li id="subcategory-1-105-stickers" class="subcategory">
						<div>Xmas2009</div>
					</li>
				
				
				

			</ul>
		</li>
		<li id="maincategory-4-backgrounds" class="main-category">
			<div>Backgrounds</div>
			<ul class="purchase-subcategory-list" id="main-category-items-4">
			
				
					<li id="subcategory-1-104-stickers" class="subcategory">
						<div>Backgrounds</div>
					</li>
				

			</ul>
		</li>
		<li id="maincategory-3-stickie_notes" class="main-category-no-subcategories">
			<div>Notes</div>
			<ul class="purchase-subcategory-list" id="main-category-items-3">

				<li id="subcategory-3-101-stickie_notes" class="subcategory">
					<div>29</div>
				</li>

			</ul>
		</li>
</ul>

	</div>
</div>

<div id="webstore-content-container" style="display: none;">
	<div id="webstore-items-container" style="display: none;">
		<h4>Select an item by clicking it</h4>
		<div id="webstore-items"><ul id="webstore-item-list">
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
	<li class="webstore-item-empty"></li>
</ul></div>
	</div>
	<div id="webstore-preview-container" style="display: none;">
		<div id="webstore-preview-default"></div>
		<div id="webstore-preview"></div>
	</div>
</div>

<div id="inventory-categories-container" style="display: block;">
	<h4>Categories:</h4>
	<div id="inventory-categories">
<ul class="purchase-main-category">
	<li id="inv-cat-stickers" class="selected-main-category-no-subcategories">
		<div>Stickers</div>
	</li>
	<li id="inv-cat-backgrounds" class="main-category-no-subcategories">
		<div>Backgrounds</div>
	</li>
	<li id="inv-cat-widgets" class="main-category-no-subcategories">
		<div>Widgets</div>
	</li>
	<li id="inv-cat-notes" class="main-category-no-subcategories">
		<div>Notes</div>
	</li>
</ul>

	</div>
</div>

<div id="inventory-content-container" style="display: block;">
	<div id="inventory-items-container" style="display: block;">
		<h4>Select an item by clicking it</h4>
		<div id="inventory-items">
		
		
<div class="webstore-frank">
	<div class="blackbubble">
		<div class="blackbubble-body">

<p><b>Your inventory for this category is completely empty!</b></p>
<p>To be able to purchase stickers, backgrounds and notes, click on Web Store tab and select a category and a product, then click Purchase.</p>

		<div class="clear"></div>
		</div>
	</div>
	<div class="blackbubble-bottom">
		<div class="blackbubble-bottom-body">
			<img src="https://images.alex-dev.org/web-gallery/images/box-scale/bubble_tail_small.gif" alt="" width="12" height="21" class="invitation-tail">
		</div>
	</div>
	<div class="webstore-frank-image"><img src="https://images.alex-dev.org/web-gallery/images/frank/sorry.gif" alt="" width="57" height="88"></div>
</div>

		
		<ul id="inventory-item-list">




	<li class="webstore-item-empty selected"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>

	<li class="webstore-item-empty"></li>


</ul>
		</div>
	</div>
	
	<div id="inventory-preview-container" style="display: block;">
		<div id="inventory-preview-default"></div>
		<div id="inventory-preview">
		<h4>&nbsp;</h4>

<div id="inventory-preview-box" style="display:none"><div id="inventory-preview-pre" class="" title=""></div></div>

		

</div>
	</div>
</div>

<div id="webstore-close-container" style="display: block;">
	<div class="clearfix"><a href="#" id="webstore-close" class="colorlink"><span>Close</span></a></div>
</div>
</div></div>
				   
				   ';

			}
		}
	}
	
}

?>