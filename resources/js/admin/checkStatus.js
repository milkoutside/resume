export async function checkStatus() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        try {
            const response = await $.get('/admin/check');
            return response.status;
        } catch (error) {
            console.error(error);
        }


}
