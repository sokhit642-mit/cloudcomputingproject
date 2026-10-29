<div class="modal fade" id="checkout" tabindex="-1"
aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class=" bg-danger d-flex "
            style="border-top-left-radius: 6px;border-top-right-radius: 6px;">
            <center>
                {{-- <h5 class="modal-title text-white"
                    id="exampleModalLabel">Modal title</h5> --}}
                <img src="{{asset('phoenix-assets/images/KHQR_available_here_-_logo_with_bg-removebg-preview.png')}}" class="p-3" width="20%" alt="">
            </center>
            {{-- <span class=" mt-3 text-white" style="margin-right: 20px;" id="countdown">2:00</span> --}}

            {{-- <button type="button" class="btn-close"
                data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body text-center">
            <div class="border-dashed-y">
                <span class=" mt-3" id="countdown">2:00</span>

                <p class=" mb-2">Scan. Pay. Done.</p>
                <p wire:ignore class=" mb-2">${{ $this->totalProductAmount - $discount}}.00</p>

            </div>
            <center>
                <div class="qr-code text-center">
                    <img src="{{asset('phoenix-assets/images/Dollar.png')}}" style="position: absolute;width:20%;height:20%;margin-top:80px;margin-left:80px;" width="10%" alt="">
                    <img src="" class=" pr-2 pt-2 pl-2 pb-2" id="image" alt="QR Code" style="margin-bottom: 40px;" />
                    <div class="corner top-left"></div>
                    <div class="corner top-right"></div>
                    <div class="corner bottom-left"></div>
                    <div class="corner bottom-right"></div>
                </div>
            </center>



        </div>
        <div class="modal-footer bg-danger">

        </div>
    </div>
</div>
</div>