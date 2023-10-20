<div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item <?php if($cur_page == 'customer-dashboard.php') {echo 'active';} ?>">
            <a href="customer-dashboard">Dashboard</a>
        </li>
        <li class="list-group-item <?php if($cur_page == 'customer-wishlist.php') {echo 'active';} ?>">
            <a href="customer-wishlist">Wishlist</a>
        </li>
        <li class="list-group-item <?php if($cur_page == 'customer-messages.php'||$cur_page == 'customer-message-create.php'||$cur_page == 'customer-message.php') {echo 'active';} ?>">
            <a href="customer-messages">Messages</a>
        </li>
        <li class="list-group-item <?php if($cur_page == 'customer-edit-profile.php') {echo 'active';} ?>">
            <a href="customer-edit-profile">Edit Profile</a>
        </li>
        <li class="list-group-item">
            <a href="customer-logout">Logout</a>
        </li>
    </ul>
</div>