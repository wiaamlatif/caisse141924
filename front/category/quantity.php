<div class="d-flex mb-3 justify-content-center"> 

    <button onclick="return false" type="submit" class="supItemCart btn btn-danger btn-sm">
            <i class="fa-solid fa-trash-can"></i>
    </button>
                                
    <button class="qtyMinus btn btn-primary btn-sm mx-2" onclick="return false">
        <strong>-</strong>
    </button>  

    <input  class="idProduct" type="hidden" value="<?=$idProduct?>">

    <input  class="qtyInput" type="text" value="<?=$quantityItem?>" readonly>    

    <button class="qtyPlus btn btn-primary btn-sm mx-2" onclick="return false">
        <strong>+</strong>
    </button>  

</div>