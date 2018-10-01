<!-- ##### Advance Search Area Start ##### -->
<div class="south-search-area" style="z-index: 99">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="advanced-search-form">
                    <!-- Search Title -->
                    <div class="search-title">
                        <p>Tìm kiếm</p>
                    </div>
                    <!-- Search Form -->
                    <form action="{{route('timPhong')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-12 col-md-2 col-lg-2">
                                <select class="form-control" name="loaichothue">
                                    @foreach ($loaichothue as $tp)
                                    <option value="{{$tp->id}}">{{$tp->LoaiChoThue}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="col-12 col-md-2 col-lg-2">
                                <div class="form-group">
                                    <select class="form-control" id="quan" name="quan">
                                        <option>Tất cả quận</option>
                                        @foreach ($quan as $q)
                                        <option value="{{$q->id}}">{{$q->TenQuan}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-2 col-lg-2">
                                <div class="form-group" id="select">
                                    <select class="form-control" name="phuong" id="phuong">
                                        <option value="0">Phường</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-2 col-lg-2">
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

                            <div class="col-12 col-md-2 col-lg-2">
                                <div class="form-group">
                                    <select class="form-control" id="gia" name="gia">
                                        <option value="0">Khoảng giá</option>
                                        <option value="1">Dưới 800 triệu</option>
                                        <option value="2">800 triệu - 1,5 tỷ</option>
                                        <option value="3">1,5 tỷ - 2,5 tỷ</option>
                                        <option value="4">2,5 tỷ - 4 tỷ</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-2 col-lg-2">
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