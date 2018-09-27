<div class="south-search-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="advanced-search-form">
                    <!-- Search Title -->
                    <div class="search-title">
                        <p>Tìm kiếm</p>
                    </div>
                    <!-- Search Form -->
                    <form action="#" method="post" id="advanceSearch">
                        <div class="row">

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="cities">
                                        <option>Tất cả quận</option>
                                        @foreach ($quan as $q)
                                        <option value="{{$q->id}}">{{$q->TenQuan}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="dt" name="dt">
                                        <option value="0">Diện tích</option>
                                        <option value="1">Dưới 50m2</option>
                                        <option value="2">50 - 80m2</option>
                                        <option value="3">80 - 120m2</option>
                                        <option value="4">120 - 160m2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="dt" name="gia">
                                        <option value="0">Khoảng giá</option>
                                        <option value="1">Dưới 800 triệu</option>
                                        <option value="2">800 triệu - 1,5 tỷ</option>
                                        <option value="3">1,5 tỷ - 2,5 tỷ</option>
                                        <option value="4">2,5 tỷ - 4 tỷ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3">
                                <div class="form-group">
                                    <select class="form-control" id="dt" name="gia">
                                        <option value="0">Hướng đất</option>
                                        <option value="1">Đông</option>
                                        <option value="2">Tây</option>
                                        <option value="3">Nam</option>
                                        <option value="4">Bắc</option>
                                        <option value="5">Đông-Nam</option>
                                        <option value="6">Đông-Bắc</option>
                                        <option value="7">Tây-Nam</option>
                                        <option value="8">Tây-Bắc</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-7 d-flex justify-content-between align-items-end">
                                <!-- More Filter -->
                                <div class="col-md-4">
                                </div>
                                <!-- Submit -->
                                <div class="form-group">
                                    <button type="submit" class="btn south-btn">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Advance Search Area End ##### -->