            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong></strong> Packages</h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive social_media_table">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Listing Limit</th>
                                        <th>Image Upload</th>
                                        <th>Video Upload</th>
                                        <th>Video limit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($packages as $package)
                                    <tr>
                                        <td><span class="social_icon linkedin">1</span>
                                        </td>
                                        <td><span class="list-name">$package->name</span>
                                        </td>
                                        <td>Free</td>
                                        <td>5 listing</td>
                                        <td>9 pictures</td>
                                        <td>1 video</td>
                                        <td>120 seconds</td>

                                        <td>
                                            <span class="badge badge-success">Update</span>
                                            <span class="badge badge-danger">Delete</span>
                                        </td>
                                    </tr>
                                    @empty
                                    <p>No packages listed</p>
                                    @endforelse

                                    <tr>
                                        <td><span class="social_icon twitter-table">2</i></span>
                                        </td>
                                        <td><span class="list-name">Intermediate</span>
                                        </td>
                                        <td>Paid</td>
                                        <td>10 listing</td>
                                        <td>14 pictures</td>
                                        <td>1 video</td>
                                        <td>120 seconds</td>
                                        <td>
                                            <span class="badge badge-success">Update</span>
                                            <span class="badge badge-danger">Delete</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><span class="social_icon google">3</span>
                                        </td>
                                        <td><span class="list-name">Premium</span>
                                        </td>
                                        <td>Paid</td>
                                        <td>15 listing</td>
                                        <td>19 pictures</td>
                                        <td>1 video</td>
                                        <td>120 seconds</td>
                                        <td>
                                            <span class="badge badge-success">Update</span>
                                            <span class="badge badge-danger">Delete</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
