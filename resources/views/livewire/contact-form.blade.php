<div class="cf-wrapper">
    <div class="cf-card">
        <h2 class="cf-title">Get in Touch</h2>
        <p class="cf-subtitle">We'd love to hear from you</p>

        @if (session()->has('message'))
            <div class="cf-success">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="submit">
            <div class="cf-field">
                <label class="cf-label">Name</label>
                <input type="text" wire:model.live="name" class="cf-input @error('name') cf-input-error @enderror" placeholder="Juan Dela Cruz">
                @error('name') <span class="cf-error">{{ $message }}</span> @enderror
            </div>

            <div class="cf-field">
                <label class="cf-label">Email</label>
                <input type="text" wire:model.live="email" class="cf-input @error('email') cf-input-error @enderror" placeholder="juan@example.com">
                @error('email') <span class="cf-error">{{ $message }}</span> @enderror
            </div>

            <div class="cf-field">
                <label class="cf-label">Message</label>
                <textarea wire:model.live="message" class="cf-textarea @error('message') cf-input-error @enderror" placeholder="Type your message..."></textarea>
                @error('message') <span class="cf-error">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="cf-button">Send Message</button>
        </form>
    </div>
</div>

<style>
    .cf-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        padding: 20px;
        box-sizing: border-box;
    }

    .cf-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 40px;
        width: 100%;
        max-width: 440px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .cf-title {
        margin: 0 0 4px 0;
        font-size: 24px;
        font-weight: 700;
        color: #1a1a2e;
    }

    .cf-subtitle {
        margin: 0 0 24px 0;
        font-size: 14px;
        color: #888;
    }

    .cf-success {
        background: #d1fae5;
        color: #065f46;
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    .cf-field {
        margin-bottom: 18px;
    }

    .cf-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
    }

    .cf-input,
    .cf-textarea {
        width: 100%;
        padding: 12px 14px;
        border: 1.5px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        box-sizing: border-box;
        transition: border-color 0.2s, box-shadow 0.2s;
        font-family: inherit;
    }

    .cf-input:focus,
    .cf-textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
    }

    .cf-textarea {
        min-height: 100px;
        resize: vertical;
    }

    .cf-input-error {
        border-color: #ef4444 !important;
    }

    .cf-input-error:focus {
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15) !important;
    }

    .cf-error {
        display: block;
        color: #ef4444;
        font-size: 12px;
        margin-top: 5px;
    }

    .cf-button {
        width: 100%;
        padding: 13px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        margin-top: 6px;
        transition: opacity 0.2s, transform 0.1s;
    }

    .cf-button:hover {
        opacity: 0.9;
    }

    .cf-button:active {
        transform: scale(0.98);
    }
</style>