        <div class="container">
            <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
            
                <button type="button" id="sidebarCollapse" class="btn btn-info btn-show-menu">
                    <i class="fas fa-align-left"></i>
                    <span>Menu</span>
                </button>

                <a href="home_page"> 
                    <img src="<?php echo base_url("assets/imgs/TAU2.png") ?>" style="width: 100%;">
                </a>
                <a class="nav-link" href="<?php echo base_url("home_page"); ?>"> TAU, E-Learning for Agriculture Department</a>

                <button class="btn btn-dark d-inline-block d-lg-none ml-auto btn-show-top-menu" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="nav navbar-nav ml-auto">
                    		
                        <li class="nav-item " id="menu_home">
                            <a class="nav-link" href="<?php echo base_url("home_page"); ?>"><span class="fa fa-home"></span> Home</a>
                        </li>
                        
                        <li class="nav-item" id="menu_profile">
                            <a class="nav-link" href="<?php echo base_url("student_profile"); ?>"><span class="fa fa-user"></span> Profile</a>
                        </li>

                        <li class="nav-item" id="menu_quiz_results">
                            <a class="nav-link" href="<?php echo base_url("quizzes_results"); ?>"><span class="fa fa-pencil-alt"></span> Quiz Results</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url("student_logout"); ?>"><span class="fa fa-sign-out-alt"></span> Sign out</a>
                        </li>

                        <li class="nav-item" style="width: 300px;">
                            <form class="frm-search-lessons">
                                <div class="input-group">
                                    <input type="text" class="form-control search-article search-lessons-str" placeholder="Search">
                                    <div class="input-group-btn">
                                    <button class="btn btn-default btn-search-article btn-search-lessons" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    </div>
                                </div>
                            </form>
                                
                        </li>
                        
                    </ul>

                </div>


            </nav>
        </div>