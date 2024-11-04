<form id="form-input">
    <label class="relative inline-flex items-center justify-between mb-2 cursor-pointer w-full">
        <span class="font-medium text-gray-700">Aktifkan Link social media</span>
        <div class="relative">
            <input type="checkbox" value="true" class="sr-only peer" id="social-media-switch" checked>
            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300  peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all  peer-checked:bg-blue-600">
            </div>
        </div>
    </label>
    <div class="form-group mb-3 social-media-group">
        <label for="website-link" class="form-label">Website Link:</label>
        <input type="text" id="website-link" name="website_url" class="form-control" placeholder="Enter website link">
    </div>
    <div class="form-group mb-3 social-media-group">
        <label for="facebook-link" class="form-label">Facebook Link:</label>
        <input type="text" id="facebook-link" name="facebook_url" class="form-control" placeholder="Enter Facebook link">
    </div>
    <div class="form-group mb-3 social-media-group">
        <label for="twitter-link" class="form-label">Twitter Link:</label>
        <input type="text" id="twitter-link" name="twitter_url" class="form-control" placeholder="Enter Twitter link">
    </div>
    <div class="form-group mb-3 social-media-group">
        <label for="instagram-link" class="form-label">Instagram Link:</label>
        <input type="text" id="instagram-link" name="instagram_url" class="form-control" placeholder="Enter Instagram link">
    </div>
    <div class="form-group mb-3">
        <label for="note" class="form-label">Note:</label>
        <textarea type="text" id="note" name="notes" class="form-control" placeholder="Enter Note" rows="10"></textarea>
    </div>
    <div class="d-grid">
        <button class="btn btn-block btn-primary" id="submit-receipt-button">Simpan</button>
    </div>
</form>