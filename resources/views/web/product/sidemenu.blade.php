<!-- Sidemenu -->
<form action="{{ route('product.index') }}" method="GET">
    @foreach(request()->except(['brand', 'category', 'gender']) as $key => $item)
    <input type="hidden" name="{{ $key }}" value="{{ $item }}" readonly>
    @endforeach
    <div class="py-2">
        <h4 class="m-text14 p-b-7">
            Gender
        </h4>  
        <div class="flex-w">
            <div class="rs2-select2 bo4 of-hidden w-100">
                <select class="selection-2" name="gender">
                    <option value="all" @if(empty(request()->brand)) selected @endif>All</option>
                    <option value="man" @if(request()->gender == 'man') selected @endif>Man</option>
                    <option value="woman" @if(request()->gender == 'woman') selected @endif>Woman</option>
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="py-2">
        <h4 class="m-text14 p-b-7">
            Categories
        </h4>  
        <div class="flex-w">
            <div class="rs2-select2 bo4 of-hidden w-100">
                <select class="selection-2" name="category">
                    <option value="all" @if(empty($request->category)) selected @endif>All</option>
                    @foreach ($categories as $category)
                    <option value="{{ strtolower($category->name) }}" @if(request()->category == strtolower($category->name)) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>         
    <hr>
    <div class="py-2">
        <h4 class="m-text14 p-b-7">
            Brands
        </h4>  
        <div class="flex-w">
            <div class="rs2-select2 bo4 of-hidden w-100">
                <select class="selection-2" name="brand">
                    <option value="all" @if(empty($request->brand)) selected @endif>All</option>
                    @foreach ($brands as $brand)
                    <option value="{{ strtolower($brand->name) }}" @if(request()->brand == strtolower($brand->name)) selected @endif>{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-black w-100 mt-3">Filter</button>
</form>