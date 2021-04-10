<div class="row">
    <div class="col-md-4">
        <label for="status">Status</label>
        <input type="text" name="status" class="form-control" value="{{ isset($status) ? $status : '' }}" readonly>
    </div>
    <div class="col-md-4">
        <label for="status_by_admin">Status By Admin</label>
        <input type="text" name="status_by_admin" class="form-control" value="{{ isset($statusByAdmin) ? $statusByAdmin : '' }}" readonly>
    </div>
    <div class="col-md-4">
        <label for="status_by_super_admin">Status By Super Admin</label>
        <input type="text" name="status_by_super_admin" class="form-control" value="{{ isset($statusBySuperAdmin) ? $statusBySuperAdmin : '' }}" readonly>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <label for="reject_note">Reject Note</label>
        <textarea type="text" name="reject_note" class="form-control" value="{{ isset($rejectNote) ? $rejectNote : '' }}" readonly></textarea>
    </div>
    <div class="col-md-6">
        <label for="removed_note">Removed Note</label>
        <textarea type="text" name="removed_note" class="form-control" value="{{ isset($removedNote) ? $removedNote : '' }}" readonly></textarea>
    </div>
</div>
