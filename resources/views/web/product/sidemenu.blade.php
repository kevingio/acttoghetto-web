<!-- Sidemenu -->
<form action="{{ route('product.index') }}" method="GET">
    @foreach(request()->except(['category']) as $key => $item)
    <input type="hidden" name="{{ $key }}" value="{{ $item }}" readonly>
    @endforeach
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
    <button type="submit" class="btn btn-black w-100 mt-3">Filter</button>
</form>