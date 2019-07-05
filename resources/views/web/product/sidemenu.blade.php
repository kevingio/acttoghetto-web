<!-- Sidemenu -->
<form action="" method="">                     
    <ul class="p-b-54">
        <li class="p-t-4">
            <h4 class="m-text14 p-b-7">
                Gender
            </h4>  
        </li>

        <li class="p-t-4">
            <div class="custom-controls-stacked d-block ">
                <label class="custom-control material-checkbox">
                    <input type="checkbox" class="material-control-input">
                    <span class="material-control-indicator"></span>
                    <span class="material-control-description">All</span>
                </label>
            </div>
        </li>

        <li class="p-t-4">
            <div class="custom-controls-stacked d-block ">
                <label class="custom-control material-checkbox">
                    <input type="checkbox" class="material-control-input">
                    <span class="material-control-indicator"></span>
                    <span class="material-control-description">Man</span>
                </label>
            </div>
        </li>

        <li class="p-t-4">
            <div class="custom-controls-stacked d-block ">
                <label class="custom-control material-checkbox">
                    <input type="checkbox" class="material-control-input">
                    <span class="material-control-indicator"></span>
                    <span class="material-control-description">Woman</span>
                </label>
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
            <div class="custom-controls-stacked d-block ">
                <label class="custom-control material-checkbox">
                    <input type="checkbox" class="material-control-input">
                    <span class="material-control-indicator"></span>
                    <span class="material-control-description">All</span>
                </label>
            </div>
        </li>
        @foreach ($categories as $item)
        <li class="p-t-4">
            <div class="custom-controls-stacked d-block ">
                <label class="custom-control material-checkbox">
                    <input type="checkbox" class="material-control-input">
                    <span class="material-control-indicator"></span>
                    <span class="material-control-description">{{ $item->name }}</span>
                </label>
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
            <div class="custom-controls-stacked d-block ">
                <label class="custom-control material-checkbox">
                    <input type="checkbox" class="material-control-input">
                    <span class="material-control-indicator"></span>
                    <span class="material-control-description">All</span>
                </label>
            </div>
        </li>
        @foreach ($brands as $item)
        <li class="p-t-4">
            <div class="custom-controls-stacked d-block ">
                <label class="custom-control material-checkbox">
                    <input type="checkbox" class="material-control-input">
                    <span class="material-control-indicator"></span>
                    <span class="material-control-description">{{ $item->name }}</span>
                </label>
            </div>
        </li>
        @endforeach

        <li class="p-t-4">
            <div class="text-center mt-3">
                <button class="btn btn-success w-100">Filter</button>
            </div>
        </li>
    </ul>
</form>