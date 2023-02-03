            <?= $this->Html->css(['navbar']) ?>
            <nav class="nav">
                <div class="nav-main">
                    <ul class="nav-links">
                        <?php if (!empty($loginUser)) { ?>
                            <li class="nav-link">
                                <?= $this->Html->link(__('Index'), ['controller' => 'users', 'action' => 'admin'], ['class' => 'sample']) ?>
                            </li>
                        <?php } else { ?>
                    </ul>
                <?php } ?>
                </div>
                <div class="cta">
                    <li class="nav-link dropdown"><a href="" class="dropdown">Profile <i class="bi bi-chevron-compact-down"></i></a>
                        <ul class="dropdown-list">
                            <?php if (!empty($loginUser)) { ?>
                                <li class="nav-link">
                                    <?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']) ?>
                                </li>
                            <?php } else { ?>
                                <li class="nav-link">
                                    <?= $this->Html->link(('Register'), ['controller' => 'users', 'action' => 'signup']) ?>
                                </li>
                                <li class="nav-link">
                                    <?= $this->Html->link(__('Login(User)'), ['controller' => 'users', 'action' => 'user_login']) ?>
                                </li>
                                <li class="nav-link">
                                    <?= $this->Html->link(__('Login(Admin)'), ['controller' => 'users', 'action' => 'admin_login']) ?>
                                </li>
                                <li class="nav-link">
                                    <?= $this->Html->link(__('Go back'), ['action' => 'indexpage']) ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </div>
            </nav>