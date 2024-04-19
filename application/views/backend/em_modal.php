                          
                        <!-- sample modal content -->
                        <div class="modal fade" id="ExpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Notes Modal</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Notes" id="notesmodal" enctype="multipart/form-data">
                                    <div class="modal-body">
			                                    	<div class="form-group">
			                                    	    <label> Notes</label>
                                                        <textarea name="notes" class="form-control form-control-line notes" required></textarea>
			                                    	 
			                                    	</div>
			                                                      
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="emid" value=""> 
                                        <input type="hidden" name="id" value=""> 
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                          <!-- sample modal content -->
                          <div class="modal fade" id="ShiftModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Office Shift </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_shift" id="officemodal" enctype="multipart/form-data">
                                    <div class="modal-body">
			                                    	<div class="form-group">
			                                    	    <label> Shift Name</label>
                                                        <input type="text" name="shift_name" class="form-control form-control-line shift_name"  required > 
			                                    	 
			                                    	</div>
                                                    <div class="form-group ">
			                                    	    <label> Shift From</label>
                                                        <input type="text" name="shift_from" class="form-control form-control-line shift_from"  required > 
			                                   
			                                    	</div>
                                                    <div class="form-group ">
			                                    	    <label>Shift To </label>
                                                        <input type="text" name="shift_to" class="form-control form-control-line shift_to"  required > 
			                                   
			                                    	</div>         
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="id" value=""> 
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>