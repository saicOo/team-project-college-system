<table class="table table-hover table-inbox" id="table-inbox">
    <tbody class="rowlinkx" data-link="row">
        @foreach ($messages as $message)
            {{-- If the message was read but not answered --}}
            @if ($message->status == 1)
                <tr data-id="{{ $message->id }}">

                    <td>
                        <a href="{{ route('inbox.show', $message->id) }}">{{ $message->student->first_name }}
                            {{ $message->student->last_name }}</a>
                    </td>
                    <td class="mail-message">{{ $message->private_q }}</td>
                    <td class="mail-label hidden-xs"><i class="fa fa-circle text-warning"></i></td>
                    <td class="text-right">{{ $message->created_at }}</td>
                    <td>
                        <a class="btn btn-outline-danger" href="#" data-item_id="{{ $message->id }}" data-toggle="modal"
                            data-target="#deleteM"><i class="fa fa-trash-o"></i></a>
                    </td>

                </tr>
                {{-- If the message has been read and answered --}}
            @elseif($message->status == 2)
                <tr data-id="{{ $message->id }}">

                    <td>
                        <a href="{{ route('inbox.show', $message->id) }}">{{ $message->student->first_name }}
                            {{ $message->student->last_name }}</a>
                    </td>
                    <td class="mail-message">{{ $message->private_q }}</td>
                    <td class="mail-label hidden-xs"></td>
                    <td class="text-right">{{ $message->created_at }}</td>
                    <td>
                        <a class="btn btn-outline-danger" href="#" data-item_id="{{ $message->id }}" data-toggle="modal"
                            data-target="#deleteM"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                {{-- If you do not read or reply --}}
            @else
                <tr class="unread" data-id="{{ $message->id }}">

                    <td>
                        <a href="{{ route('inbox.show', $message->id) }}">{{ $message->student->first_name }}
                            {{ $message->student->last_name }}</a>
                    </td>
                    <td class="mail-message">{{ $message->private_q }}</td>
                    <td class="mail-label hidden-xs"><i class="fa fa-circle text-success"></i></td>

                    <td class="text-right">{{ $message->created_at }}</td>
                    <td>
                        <a class="btn btn-outline-danger" href="#" data-item_id="{{ $message->id }}" data-toggle="modal"
                            data-target="#deleteM"><i class="fa fa-trash-o"></i></a>
                    </td>

                </tr>
            @endif
        @endforeach
    </tbody>
</table>
<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
<ul class="pagination justify-content-end m-t-0 m-l-10">
    {{ $messages->links() }}
</ul>
