<!-- Sidemenu -->
<form action="" method="">                     
    <ul class="p-b-54">
        <li class="p-t-4">
            <h4 class="m-text14 p-b-7">
                Gender
            </h4>  
        </li>

        <li class="p-t-4">
            <div class="custom-control checkbox-style mb-1">
                <input type="checkbox" class="custom-control-input" id="checkBox1" name="">
                <label class="custom-control-label" for="checkBox1">All</label>
            </div>
        </li>

        <li class="p-t-4">
            <div class="custom-control checkbox-style mb-1">
                <input type="checkbox" class="custom-control-input" id="checkBox2" name="">
                <label class="custom-control-label" for="checkBox2">Man</label>
            </div>
        </li>

        <li class="p-t-4">
            <div class="custom-control checkbox-style">
                <input type="checkbox" class="custom-control-input" id="checkBox3" name="">
                <label class="custom-control-label" for="checkBox3">Woman</label>
            </div>
        </li>

        <li class="p-t-4">
            <hr class="mb-3">
        </li>

        <li class="p-t-4">
            <h4 class="m-text14 p-b-7">
                Categories
            </h4>  
        </li>

        <li class="p-t-4">
            <div class="custom-control checkbox-style mb-1">
                <input type="checkbox" class="custom-control-input" id="checkBox4" name="">
                <label class="custom-control-label" for="checkBox4">All</label>
            </div>
        </li>
        @foreach ($categories as $item)
        <li class="p-t-4">
            <div class="custom-control checkbox-style mb-1">
                <input type="checkbox" class="custom-control-input" id="checkBox5" name="">
            <label class="custom-control-label" for="checkBox5">{{ $item->name }}</label>
            </div>
        </li>
        @endforeach

        <li class="p-t-4">
            <hr class="mb-3">
        </li>

        <li class="p-t-4">
            <h4 class="m-text14 p-b-7">
                Brands
            </h4>  
        </li>

        <li class="p-t-4">
            <div class="custom-control checkbox-style mb-1">
                <input type="checkbox" class="custom-control-input" id="checkBox4" name="">
                <label class="custom-control-label" for="checkBox4">All</label>
            </div>
        </li>
        @foreach ($brands as $item)
        <li class="p-t-4">
            <div class="custom-control checkbox-style mb-1">
                <input type="checkbox" class="custom-control-input" id="checkBox5" name="">
            <label class="custom-control-label" for="checkBox5">{{ $item->name }}</label>
            </div>
        </li>
        @endforeach
    </ul>
</form>