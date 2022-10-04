 <form style="display: inline;" method="POST" action="{{ route('cities.destroy',['id'=>$city->id]) }}">
                        <button onclick="return confirm('Are you sure?');" class="btn btn-primary btn-xs" type="submit"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                        @method('DELETE')
                        {{ csrf_field() }} 
</form>