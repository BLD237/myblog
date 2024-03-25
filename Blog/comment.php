<div class="card-footer">
                        <form action="action.php?r=<?php echo $id?> " method="post">
                            <div class="form-group">
                                <label for="comment">Leave a Comment</label>
                                <textarea class="form-control" id="comment" rows="3" name="comment" ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="action" value="comment" >Submit</button>
                        </form>
                    </div>