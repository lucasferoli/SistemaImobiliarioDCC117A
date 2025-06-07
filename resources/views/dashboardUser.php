<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard - Properties & Transactions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="mb-4">My Dashboard</h1>

        <!-- Properties Announced -->
        <div class="card mb-5">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">My Properties</h4>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/350x200?text=House+1" class="card-img-top" alt="House 1">
                            <div class="card-body">
                                <h5 class="card-title">Cozy Family House</h5>
                                <p class="card-text">3 beds, 2 baths, 120m²<br>Location: Downtown</p>
                                <span class="badge bg-success">For Sale</span>
                            </div>
                            <div class="card-footer text-muted">
                                Announced: 2024-05-10
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/350x200?text=Apartment+2" class="card-img-top" alt="Apartment 2">
                            <div class="card-body">
                                <h5 class="card-title">Modern Apartment</h5>
                                <p class="card-text">2 beds, 1 bath, 80m²<br>Location: Uptown</p>
                                <span class="badge bg-warning text-dark">For Rent</span>
                            </div>
                            <div class="card-footer text-muted">
                                Announced: 2024-06-01
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/350x200?text=Studio+3" class="card-img-top" alt="Studio 3">
                            <div class="card-body">
                                <h5 class="card-title">Studio Flat</h5>
                                <p class="card-text">1 bed, 1 bath, 40m²<br>Location: City Center</p>
                                <span class="badge bg-success">For Sale</span>
                            </div>
                            <div class="card-footer text-muted">
                                Announced: 2024-04-20
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaction History -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h4 class="mb-0">Transaction History</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Property</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2024-06-10</td>
                            <td>Modern Apartment</td>
                            <td>Rent</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>$1,200</td>
                        </tr>
                        <tr>
                            <td>2024-05-15</td>
                            <td>Cozy Family House</td>
                            <td>Sale</td>
                            <td><span class="badge bg-danger">Cancelled</span></td>
                            <td>$150,000</td>
                        </tr>
                        <tr>
                            <td>2024-04-25</td>
                            <td>Studio Flat</td>
                            <td>Sale</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td>$60,000</td>
                        </tr>
                        <tr>
                            <td>2024-03-30</td>
                            <td>Modern Apartment</td>
                            <td>Rent</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td>$1,100</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>
</html>