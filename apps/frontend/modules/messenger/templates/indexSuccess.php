<script src="/js/dummy.js"></script>

<!--<div class="container_12" id="header" >
	<header>
		 Logo Here 
		<a href="#">
			<div id="logo" class="grid_4"></div> end #logo .grid_4 
		</a>
		 Main Navigation Here 
		<nav id="top_nav" class="grid_8">
                    <ul id="main-nav" class="sf-menu">
                        <li>
                                <a href="/index.php/home/index" class="active">Home</a> 
                        </li> 
                        <li title="My Account"> 
                                <a href="/index.php/home/edit">My Account</a> 
                        </li> 
                        <li title="Postings">
                            <a href="#">Postings</a>
                            <ul>
                                <li> 
                                        <a href="/index.php/postings/create">Create Postings</a> 
                                </li>
                                <li> 
                                        <a href="/index.php/postings/index">Search Postings</a> 
                                </li>			
                            </ul>
                        </li>
                        <li title="Hot List"> 
                                <a href="/index.php/hotlist/index">Hot List</a> 
                        </li> 
                        <li class="current" title="#F9CD4B"> 
                                <a href="#">Messages</a> 
                        </li> 
                        <li title="Sign-Out"> 
                                <a href="/index.php/home/signOut">Sign-Out</a> 
                        </li> 
                    </ul> 		
		</nav>
	</header>
</div>  end #container_12 #header -->

<div class="clear"></div>

<input type="hidden" id="username" name="username" value="<?php echo $_SESSION['username'] ?>" />
<br/>
<div class="container_12" id="body-wrap" role="main">

    <div id="div-msgnr"></div>
    
    <div id="sidebar" class="grid_4 suffix_1">
        <ul id="messenger" class="nav"></ul>
    </div>
    
    <div id="post-content-wrap" class="grid_7">
        <div id="posting-title"></div>
        <div id="chatbox" style="border: 0px solid #557FFF; width: 100%; height: 300px; padding: 10px; background-color: #EDF3F7; overflow-y:scroll"> 
            
            <div id="loading-chat" style="display:none; width: 120px; height: auto; margin: 0 auto;">            
                Loading messages...
            </div>
            
            <table style="border: 0px solid!important; width: 100%;"></table>
        </div>   
        
        <div>
            <input type="hidden" id="top_msg_id" name="top_msg_id" value="0"/>

            <span style="float:left;width: 480px; font-size:11px; font-family: calibri;">
                <textarea id="message" name="message" style="padding:5px;"></textarea>
            </span>
            <div style=" margin-top: 19px; float: right;">
                <input type="button" id="send_message" class='submit' name="send_message" value="Send" width="200px" style="padding: 3px!important;"/>
            </div>
        </div>
    </div>
    
<!--    <p class="external">
    <a href="#" id="collapseAll">Collapse All</a> | <a href="#" id="expandAll">Expand All</a>
</p>-->
</div>
