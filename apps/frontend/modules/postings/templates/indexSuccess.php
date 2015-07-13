<style>
.dropdown.dropdown-lg .dropdown-menu {
    margin-top: -1px;
    padding: 6px 20px;
}

.input-group-btn .btn-group {
    display: flex !important;
}
.btn-group .btn {
    border-radius: 0;
    margin-left: -1px;
}
.btn-group .btn:last-child {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
.btn-group .form-horizontal .btn[type="submit"] {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.form-horizontal .form-group {
    margin-left: 0;
    margin-right: 0;
}
.form-group .form-control:last-child {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}

@media screen and (min-width: 768px) {
    #adv-search {
        width: 300px;
/*        margin: 0 auto;*/
        float:right;
        margin-right: 3px;
    }
    .dropdown.dropdown-lg {
        position: static !important;
    }
    .dropdown.dropdown-lg .dropdown-menu {
        min-width: 300px;
    }
}

</style>
<div class="container">    
        <div class="row">
        <div class="col-md-6">
            <form class="form-inline" role="form">
                <div class="form-group">
                <label for="sortBy">Sort By</label>
                <?php 
                    $element = '<select class="form-control" id="sortBy" name="sortBy">';
                    $value = 0;
                    foreach($sort_by as $sortName)
                    {
                        $selected = ($value == 0)? 'selected':'';
                        $element .= '<option value="'.$value.'" '.$selected.'>'.$sortName.'</option>';
                        $value++;
                    }
                    $element .= '</select>';
                    echo $element;
                ?>
                </div>
                <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span> GO</button>     
<!--                <button type="button" class="btn btn-success">Create Post</button>-->
            </form>
        </div>

        <div class="col-md-6">
            
        <div class="input-group" id="adv-search">
            <input type="text" class="form-control" placeholder="Search Posts" />
            <div class="input-group-btn">
                <div class="btn-group" role="group">
                    <div class="dropdown dropdown-lg">
                        <button type="button" class="btn btn-success dropdown-toggle form-control" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                <label for="srchCountry">Country</label>
                                <?php 
                                    $element = '<select class="form-control" id="srchCountry" name="srchCountry">';
                                    foreach($countries as $countryId => $name)
                                    {                                        
                                        $element .= '<option value="'.$countryId.'" >'.$name.'</option>';
                                    }
                                    $element .= '</select>';
                                    echo $element;
                                ?>
                                </div>
                                <div class="form-group">
                                <label for="srchState">State</label>
                                <select class="form-control" id="srchState" name="srchState">
                                    <option value="0">All</option>
                                    <option value="1">Featured</option>
                                    <option value="2">Most popular</option>
                                    <option value="3">Top rated</option>
                                    <option value="4">Most commented</option>
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="srchCity">City</label>
                                <select class="form-control" id="srchCity" name="srchCity">
                                    <option value="0">All</option>
                                    <option value="1">Featured</option>
                                    <option value="2">Most popular</option>
                                    <option value="3">Top rated</option>
                                    <option value="4">Most commented</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="zipcode">Zip Code</label>
                                    <input class="form-control" type="text" id="zipcode" name="zipcode"/>
                                </div>
                                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                            </form>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>                    
                </div>
            </div>            
        </div>            
        </div>
    </div>
<!--   <hr class="message-inner-separator">-->
    <div id="postData" style="font-size: 12px; margin-top: 5px;"></div>    
    <div id="loading" style="display: none; font-size: 11px; text-align: center;">
        <img src='/images/loading.gif'/>                     
        <strong>Please wait while loading posts...</strong>                        
    </div> 
</div>


<!--<div class="container_12" id="body-wrap" role="main">
    <div id="post-content-wrap" class="grid_12" >
		<div class="grid_1 alpha omega">
			<span class="sort">Sort By</span>-->
<!--		</div> end .grid_1 .alpha .omega -->
		
		<?php
//			$element = '<div class="grid_11 alpha">';   
//			$element .= "<select id='sort_by' name='sort_by'>";
//			foreach($sort_by as $i => $sort)
//			{
//				$sel = ($i == 0 || (isset($sortby) && $sortby == $i))? "selected":"";
//				$element .= "<option value='$i' $sel>$sort</option>";
//			}
//			$element .= "</select>";
//                        $element .= "<input type='button' id='search_post' name='search_post' value='Go!' />";     
//                        
//                        $element .= '<div id="topnav" class="topnav">';
//                        $element .= '<a href="#" class="signin"><span>Search Posts Here!</span></a>';
//                        $element .= '<fieldset id="signin_menu">
//                                        <form method="post" id="signin" action="#">
//                                            
//                                            <fieldset>
//                                            <label for="country">Country:</label>                                    
//                                            <!--<input id="country" name="country" value="" title="country" tabindex="1" type="text">-->        
//                                            <select tabindex="1" id="search_country" name="search_country"></select>
//                                            </fieldset>
//
//                                            <fieldset>
//                                            <label for="state"><span style="margin-right:13px;">State:</span></label>                                    
//                                            <select tabindex="2" id="search_state" name="search_state"></select>
//                                            </fieldset>        
//                                            
//                                            <fieldset>
//                                            <label for="city"><span style="margin-right:20px;">City:</span></label>
//                                            <!--<input id="city" name="city" value="" title="city" tabindex="2" type="text">-->
//                                            <select tabindex="3" id="search_city" name="search_city"></select>
//                                            </fieldset>
//                                            <hr/>
//                                            <fieldset>
//                                            <label for="zipcode"><span style="margin-right:25px;">Zip:</span></label>
//                                            <input style="display:inline!important;width:170px!important;" id="search_zipcode" name="search_zipcode" value="" title="zipcode" tabindex="4" type="text">
//                                            <!--<select tabindex="4" id="search_zipcode" name="search_zipcode"></select>-->
//                                            </fieldset>';
//
//                        $element .= '<fieldset>';
//                        $element .= '<label for="miles"><span style="margin-right:18px;">Miles:</span></label>';
//                        $element .= '<select id="miles" name="miles">';
//                        $element .= '<option value="-">-</option>';
//                                    foreach(array(0, 5, 15, 20, 25, 50, 100) as $m){
//                                        $element .= '<option value="'.$m.'">'.$m.'</option>';
//                                    }
//                        $element .= '</select>';                    
//                        $element .= '</fieldset>';
//                        
//                        $element .= '
//                                    <!--<fieldset>
//                                        <label for="miles">Within:</label>
//                                            <input size=50 id="miles" name="miles" value="" title="miles" tabindex="4" type="text">
//                                        <label for="city">Miles</label>
//                                    </fieldset>-->
//                                    <hr/>
//                                    <p>
//                                        <input id="signin_submit" value="Search" tabindex="5" type="button">     
//                                        <input id="signin_submit" value="Reset" tabindex="6" type="reset">       
//                                    </p>                                                                        
//                                    </form>
//                                    ';                        
//                        $element .= '</div>';
//                        
//			$element .= "</div>";
//			echo $element;
		?>
                
<!--                <div class="clear"></div>
                <div class="hr-pattern"></div>-->
        
<!--                <div id="postings" >
                   <div id="loading">
                        <img src='/images/loading.gif'/>                     
                        <strong>Please wait while loading posts...</strong>                        
                   </div> 
                </div>
                
               
                <div class="pagination">
                    <div class="wp-pagenavi">
                        <span class="pages" id="total_page">Page 1 of 4</span>
                        <span id="pagination-div">
                            	
                        </span>
                    </div>
		</div>-->
		
<!--	</div> end #post-content-wrap .grid_12 	-->
<!--</div>  end #body-wrap .container_12 -->

<!--<div class="clear"></div>
<input type="hidden" id="last_post_id" name="last_post_id" value="<?php echo $post_id; ?>"></div>
<input type="hidden" id="page" name="page" value="<?php echo $page; ?>"></div>-->
