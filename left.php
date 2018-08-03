<aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</div>
                    <div class="email">Human Resource Administrator</div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Data Entry Modules</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="employee.php">
                                <i class="material-icons">people</i> <span>Employees Module</span>
                                </a>
                                <a href="time.php">
                                <i class="material-icons">timer</i> <span>Time Configuration Module</span>
                                </a>
                                <a href="department.php">
                                <i class="material-icons">person_add</i><span>Department Module</span>
                                </a>
                                <a href="position.php">
                                <i class="material-icons">folder</i>  <span>Position Module</span>
                                </a>
                                <a href="account.php">
                                <i class="material-icons">person</i>  <span>Account Module</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Main Module</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="generatedtr.php"><i class="material-icons">timelapse</i><span>Generate Daily Time Record</span></a>
                            </li>   
                            <li>
                                <a href="dtrviewer.php"><i class="material-icons">timelapse</i><span>Daily Time Generated DTR Viewer</span></a>
                            </li>   
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Reports</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#"><i class="material-icons">assignment</i><span>Daily Time Records Report</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="material-icons">assignment</i><span>List Of Employees</span></a>
                            </li>
                            <li>
                            <a href="#"><i class="material-icons">assignment</i><span>List Of Tardiness Report</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings</i>
                            <span>Settings</span>
                        </a>
                            <ul class="ml-menu">
                                <li>
                                    <!--<a href="profile.php">Profile</a>-->
                                    <a href="<?php echo $logoutAction ?>">Logout</a>
                                </li>   
                            </ul>
                        
                    </li>
                   <!-- <li class="header">Status Bar</li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-red">donut_large</i>
                            <span>Important</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-amber">donut_large</i>
                            <span>Warning</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-light-blue">donut_large</i>
                            <span>Information</span>
                        </a>
                    </li>-->
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="javascript:void(0);">Orion Solutions - Larry</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>