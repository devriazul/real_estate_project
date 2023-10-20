<div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item <?php if($cur_page == 'agent-dashboard.php') {echo 'active';} ?>">
            <a href="agent-dashboard">Dashboard</a>
        </li>
        <li class="list-group-item <?php if($cur_page == 'agent-payment.php') {echo 'active';} ?>">
            <a href="agent-payment">Make Payment</a>
        </li>
        <li class="list-group-item <?php if($cur_page == 'agent-orders.php') {echo 'active';} ?>">
            <a href="agent-orders">Orders</a>
        </li>
        <li class="list-group-item <?php if($cur_page == 'agent-property-add.php') {echo 'active';} ?>">
            <a href="agent-property-add">Add Property</a>
        </li>
        <li class="list-group-item <?php if($cur_page == 'agent-properties.php') {echo 'active';} ?>">
            <a href="agent-properties">All Properties</a>
        </li>
        <li class="list-group-item <?php if($cur_page == 'agent-messages.php'||$cur_page == 'agent-message.php') {echo 'active';} ?>">
            <a href="agent-messages">Messages</a>
        </li>
        <li class="list-group-item <?php if($cur_page == 'agent-edit-profile.php') {echo 'active';} ?>">
            <a href="agent-edit-profile">Edit Profile</a>
        </li>
        <li class="list-group-item">
            <a href="agent-logout">Logout</a> 
        </li>
    </ul>
</div>