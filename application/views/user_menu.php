<br />

<a href="/admin/dashboard">Dashboard</a>
<br />

<a href="/client/">Invoices</a>
<a href="/client/updateinfo">Update Account</a>
<a href="/client/history">History</a>
<?php if($this->session->userdata('accesslevel') == "admin"): ?>
<br />
<a href="/admin/invoice">Add Invoice</a>
<a href="/admin/invoices">List All Invoices</a>
<a href="/admin/clients">List All Clients</a>
<br />


<?php endif; ?>
<a href="/client/logout">Log Out</a>