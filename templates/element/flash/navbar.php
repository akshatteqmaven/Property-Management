            <style>
                @import url('https://fonts.googleapis.com/css2?family=Flow+Circular&family=Manrope:wght@400;800&display=swap');

                @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css");

                nav {
                    display: flex;
                    background-color: rgb(253, 253, 253);
                    padding: 10px 26px;
                    border-bottom: 7.1px solid rgb(225, 225, 225);
                    justify-content: space-between;
                    align-items: center;
                }

                .nav-main {
                    display: flex;
                    gap: 32px;
                }

                .nav-links {
                    display: flex;
                    gap: 40px;
                    list-style: none;
                }

                a {
                    text-decoration: none;
                    color: black;
                    letter-spacing: -0.5px;
                    font-weight: bold;
                }

                a:hover {
                    color: red;

                    transition: all 0.5s ease;
                }

                .nav-link {
                    text-decoration: none;
                }

                .cta {
                    margin-right: 4rem;
                }

                .dropdown {
                    cursor: default;
                }

                .dropdown ul {
                    display: none;
                    background-color: rgb(251, 251, 251);
                    padding: 16px;
                    /* list-style: none; */
                    /* transition: all 15s ease; */

                }

                .dropdown ul li a {
                    /* color: var(--grey); */
                    color: black;
                }

                .dropdown ul li a:hover {
                    color: var(--black);
                }

                .dropdown ul li {
                    margin: 8px;
                }

                .dropdown:hover>ul {
                    display: list-item;
                    position: absolute;
                    list-style: none;
                    transition: all 0.5s ease;
                }
            </style>
            <nav class="nav">
                <div class="nav-main">
                    <ul class="nav-links">
                        <li class="nav-link">
                            <?= $this->Html->link(__('User'), ['controller' => 'users', 'action' => 'index']) ?>
                        </li>
                        <li class="nav-link">
                            <?= $this->Html->link(__('Admin'), ['controller' => 'users', 'action' => 'admin']) ?>
                        </li>
                        <li class="nav-link">
                            <?= $this->Html->link(__('Blog'), ['action' => '#']) ?>
                        </li>
                    </ul>
                </div>

                <div class="cta">
                    <li class="nav-link dropdown"><a href="" class="dropdown">Profile <i class="bi bi-chevron-compact-down"></i></a>
                        <ul class="dropdown-list">
                            <li class="nav-link">
                                <?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout']) ?>
                            </li>
                            <li class="nav-link">
                                <?= $this->Html->link(('Register'), ['controller' => 'users', 'action' => 'signup']) ?>
                            </li>
                            <li class="nav-link">
                                <?= $this->Html->link(__('Login'), ['controller' => 'users', 'action' => 'user_login']) ?>
                            </li>
                        </ul>
                    </li>
                </div>
            </nav>