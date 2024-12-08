<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Hotel Mercubuana Dua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');


:root {
        --main-color: #DD2F6E;
        --color-dark: #1d2231;
        --text-grey: #8390A2;
}


* {
    padding: 0;
    margin: 0;
    box-sizing: border-box; 
    list-style-type: none;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
}

.sidebar {
    width: 345px;
    position: fixed;
    left: 0;
    top: 0;
    height: 100%;
    background: var(--main-color);
    z-index: 100;
}

.sidebar-brand {
    height: 90px;
    padding: 1rem 0rem 1rem 2rem;
    color: #fff;
}

.sidebar-brand span {
    display: inline-block;
    padding-right: 4rem;
}

.sidebar-menu {
    margin-top: 1rem;
}

.sidebar-menu li {
    width: 100%;
    margin-bottom: 1.3rem;
    padding-left: 1rem;
}

.sidebar-menu a {
    padding-left: 1rem;
    display: block;
    color: #fff;
    font-size: 1.1rem;
}

.sidebar-menu a.active {
    background: #fff;
    padding-top: 1rem;
    padding-bottom: 1rem;
    color: var(--main-color);
    border-radius: 30px 0px 0px 30px;
}

.sidebar-menu a span:first-child {
    font-size: 1.5rem;
    padding-right: 1rem;
}

.main-content {
    margin-left: 345px;
}

header {
    display: flex;
    justify-content: space-between;
    padding: 1rem 1.5rem;
    box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
    position: fixed;
    left: 345px;
    width: calc(100% - 345px);
    top: 0;
    z-index: 100;
}

header h2 {
    color: #222;
}

header label span {
    font-size: 1.7rem;
    padding-right: 1rem;
}

.search-wrapper {
    border: 1px solid #f0f0f0;
    border-radius: 30px;
    height: 50px;
    display: flex;
    align-items: center;
    overflow-x: hidden;
}

.search-wrapper span {
    display: inline-block;
    padding: 0rem 1rem;
    font-size: 1.5rem;
}

.search-wrapper input {
    height: 100%;
    padding: .5rem;
    border: none;
    outline: none;
}

.user-wrapper {
    display: flex;
    align-items: center;
}

.user-wrapper img {
    border-radius: 50%;
    margin-right: 1rem;
}

.user-wrapper small {
    display: inline-block;
    color: var(--text-grey);
}

main {
    margin-top: 85px;
    padding: 2rem 1.5rem;
    background: #f1f5f9;
    min-height: calc(100vh - 90px);
}

.cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 2rem;
    margin-top: 1rem;
}

.card-single {
    display: flex;
    justify-content: space-between;
    background: #fff;
    padding: 2rem;
    border-radius: 2px;
}

.card-single div:last-child span {
    font-size: 3rem;
    color: var(--main-color);
}

.card-single div:first-child span {
    color: var(--text-grey);
}

.card-single:last-child {
    background: var(--main-color);
}

.card-single:last-child h1,
.card-single:last-child div:first-child span,
.card-single:last-child div:last-child span {
    color: #fff;
}

.recent-grid {
    margin-top: 3.5rem;
    display: grid;
    grid-gap: 2rem;
    grid-template-columns: 70% auto;
}

.card {
    background: #fff;
    border-radius: 5px;
}

.card-header {
    padding: 1rem;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #f0f0f0;
}

.card-header button {
    background: var(--main-color);
    border-radius: 10px;
    color: #fff;
    font-size: .8rem;
    padding: .5rem 1rem;
    border: 1px solid var(--main-color);
}

table {
    border-collapse: collapse;
}

thead tr {
    border-top: 1px solid #f0f0f0;
    border-bottom: 2px solid #f0f0f0;
}

thead td {
    font-weight: 700;
}

td {
    padding: .5rem 1rem;
    font-size: .9rem;
    color: #222;
}

td .status {
    display: inline-block;
    height: 10px;
    width: 10px;
    border-radius: 50%;
    margin-right: 1rem;
}

tr td:last-child {
    display: flex;
    align-items: center;
}

.status.green {
    background: green;
}

.status.yellow {
    background: yellow;
}

.status.red {
    background: red;
}

.table-responsive {
    width: 100%;
    overflow-x: auto;
}

.customer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: .5rem 1rem;
}

.info {
    display: flex;
    align-items: center;
}

.info img {
    border-radius: 50%;
    margin-right: 1rem;
}

.info h4 {
    font-size: .8rem;
    font-weight: 700;
    color: #222;
}
    </style>

</head>

<body>
        <div class="sidebar">
           
            <div class="sidebar-brand">
                <h4><span class="lab la-mercubuana"></span>Management Hotel</h4>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="" class="active"><span class="las la-chart-bar"></span>
                        <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href=""><span class="las la-users"></span>
                        <span>Customers</span></a>
                    </li>
                    <li>
                        <a href=""><span class="las la-igloo"></span>
                        <span>Kamar</span></a>
                    </li>
                    <li>
                        <a href=""><span class="las la-th-list"></span>
                        <span>Fasilitas</span></a>
                    </li>
                    <li>
                        <a href=""><span class="las la-hotel"></span>
                        <span>Kamar Fasilitas</span></a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="main-content">
            <header>
                <h2>
                    <label for="">
                         <span class="las la-bars"></span>
                    </label>
                    
                    Dashboard                        
                </h2>

                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="Search here" />
                </div>

                <div class="user-wrapper">
                    <img src="" width="30px" height="30px" alt="">
                    <div>
                        <h5>Admin Hotel</h5>
                        <small>Super Admin</small>
                    </div>
                </div>
            </header>

            <main>

                <div class="cards">
                    <div class="card-single">
                        <div>
                            <h1>10</h1>
                            <span>Customers</span>
                        </div>
                        <div>
                            <span class="las la-users"></span>
                        </div>
                    </div>

                    <div class="card-single">
                        <div>
                            <h1>5</h1>
                            <span>Kamar</span>
                        </div>
                        <div>
                            <span class="las la-igloo"></span>
                        </div>
                    </div>

                    <div class="card-single">
                        <div>
                            <h1>2</h1>
                            <span>Booking</span>
                        </div>
                        <div>
                            <span class="las la-shopping-bag"></span>
                        </div>
                    </div>

                    <div class="card-single">
                        <div>
                            <h1>Rp 5.000.000</h1>
                            <span>Income</span>
                        </div>
                        <div>
                            <span class="las la-comment-dollar"></span>
                        </div>
                    </div>
                </div>

                <div class="recent-grid">
                    <div class="booking">
                        <div class="card">
                            <div class="card-header">
                                <h2>Recent Booking</h2>
                                <button>See all <span class="las la-arrow-right"></span></button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table width=100%>
                                    <thead>
                                        <tr>
                                            <td>User</td>
                                            <td>Checkin</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Bram</td>
                                            <td>7 Dec 2024</td>
                                            <td>
                                                <span class="status green"></span>
                                                booked
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Botoy</td>
                                            <td>8 Dec 2024</td>
                                            <td>
                                                <span class="status yellow"></span>
                                                in progress
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Danan</td>
                                            <td>9 Dec 2024</td>
                                            <td>
                                                <span class="status red"></span>
                                                pending
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="customers">
                    <div class="card">
                            <div class="card-header">
                                <h2>Recent New Guest</h2>
                                <button>See all <span class="las la-arrow-right"></span></button>
                            </div>
                            
                            <div class="card-body">
                                <div class="customer">
                                    <div class="info">
                                        <img src="" width="40px" height="40px" alt="">
                                        <div>
                                            <h4>Lewis S. Cuninnhan</h4>
                                            <small>lewsi@gmail.com</small>
                                        </div>
                                    </div>
                                    <div class="contact">
                                        <span class="las la-user-circle"></span>
                                        <span class="las la-comment"></span>
                                        <span class="las la-phone"></span>
                                    </div>
                                </div>

                                <div class="customer">
                                    <div>
                                        <img src="" width="40px" height="40px" alt="">
                                        <div>
                                            <h4>Lewis S. Cuninnhan</h4>
                                            <small>lewsi@gmail.com</small>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="las la-user-circle"></span>
                                        <span class="las la-comment"></span>
                                        <span class="las la-phone"></span>
                                    </div>
                                </div>

                                <div class="customer">
                                    <div>
                                        <img src="" width="40px" height="40px" alt="">
                                        <div>
                                            <h4>Lewis S. Cuninnhan</h4>
                                            <small>lewsi@gmail.com</small>
                                        </div>
                                    </div>
                                    <div>
                                        <span class="las la-user-circle"></span>
                                        <span class="las la-comment"></span>
                                        <span class="las la-phone"></span>
                                    </div>
                                </div>
                            </div>

                        </div>   
                    </div>
                </div>

            </main>
        </div>

</body>
</html>