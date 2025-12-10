                        <form id="info_page" data-url="{{ route('enquiry.store') }}" method="POST" onsubmit="return false">
                               @csrf
                            <div class="row g-3">
                                <input type="text" name="page_type" id="concern" value="concern" hidden>
                                    <input type="text" name="page_name" id="page_name" value="services page" hidden>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0" placeholder="Your Name" name="fullname" id="fullname" required style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="number" class="form-control bg-white border-0" placeholder="Telephone" id="telephone" name="telephone" required style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="email" class="form-control bg-white border-0" placeholder="Email" name="email" id="email" required style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment" name="message" id="message" required></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn metro-fill text-white w-100 py-3" type="submit">Leave your concern</button>
                                </div>
                            </div>
                        </form>