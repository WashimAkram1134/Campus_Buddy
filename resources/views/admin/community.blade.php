@extends('layouts.app')

@section('title', 'Admin Panel | Community Settings')

@section('content')
<div class="admin-container" style="padding: 30px; max-width: 1200px; margin: 0 auto;">
    <div style="margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center;">
        <h1 style="font-size: 28px; font-weight: 800; color: #1e293b;">🛠️ Community Settings</h1>
        <a href="{{ route('community') }}" style="background: #00AAFF; color: white; padding: 10px 18px; border-radius: 12px; font-weight: 700; text-decoration: none;">View Community Page</a>
    </div>

    @if(session('success'))
        <div style="background: #C6F6D5; color: #22543D; padding: 12px 15px; border-radius: 12px; margin-bottom: 20px; font-weight: 600;">{{ session('success') }}</div>
    @endif

    <!-- TABS Navigation -->
    <div style="display: flex; gap: 15px; border-bottom: 2px solid #E2E8F0; margin-bottom: 25px;">
        <button class="tab-btn active-tab" id="btn-posts" onclick="switchTab('posts-tab')" style="padding: 12px 20px; font-weight: 700; font-size: 15px; border: none; background: none; cursor: pointer; color: #00AAFF; border-bottom: 2px solid #00AAFF; margin-bottom: -2px;">Manage Posts</button>
        <button class="tab-btn" id="btn-assoc" onclick="switchTab('associations-tab')" style="padding: 12px 20px; font-weight: 700; font-size: 15px; border: none; background: none; cursor: pointer; color: #718096; border-bottom: 2px solid transparent; margin-bottom: -2px;">District Associations</button>
    </div>

    <!-- POSTS MANAGEMENT TAB -->
    <div id="posts-tab" class="tab-content" style="display: block;">
        <div style="background: white; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); padding: 20px; overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="border-bottom: 2px solid #EDF2F7; color: #718096; font-size: 14px;">
                        <th style="padding: 12px;">Author</th>
                        <th style="padding: 12px;">Content</th>
                        <th style="padding: 12px;">Comments</th>
                        <th style="padding: 12px;">Likes</th>
                        <th style="padding: 12px;">Date</th>
                        <th style="padding: 12px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr style="border-bottom: 1px solid #EDF2F7; font-size: 14px; color: #1E293B;">
                        <td style="padding: 12px; font-weight: 600;">{{ $post->user->name }}</td>
                        <td style="padding: 12px; max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $post->content }}</td>
                        <td style="padding: 12px;">{{ $post->comments->count() }}</td>
                        <td style="padding: 12px;">{{ $post->likes->count() }}</td>
                        <td style="padding: 12px;">{{ $post->created_at->format('d M, Y') }}</td>
                        <td style="padding: 12px;">
                            <form action="{{ route('admin.community.post.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf @method('DELETE')
                                <button type="submit" style="background: #FC8181; color: white; border: none; padding: 6px 12px; border-radius: 8px; font-weight: 600; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" style="text-align: center; padding: 20px; color: #A0AEC0;">No posts found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- ASSOCIATIONS MANAGEMENT TAB -->
    <div id="associations-tab" class="tab-content" style="display: none;">
        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 20px;">
            <!-- Form Card -->
            <div style="background: white; border-radius: 16px; padding: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                <h3 style="margin-bottom: 15px; color: #1e293b;">➕ Add Association</h3>
                <form action="{{ route('admin.community.associations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="margin-bottom: 12px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Name</label>
                        <input type="text" name="name" required style="width: 100%; padding: 10px; border: 1px solid #E2E8F0; border-radius: 8px;">
                    </div>
                    <div style="margin-bottom: 12px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Division</label>
                        <select name="division" required style="width: 100%; padding: 10px; border: 1px solid #E2E8F0; border-radius: 8px;">
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Barisal">Barisal</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Mymensingh">Mymensingh</option>
                        </select>
                    </div>
                    <div style="margin-bottom: 12px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Link (Join Link / action URL)</label>
                        <input type="url" name="link" placeholder="https://..." style="width: 100%; padding: 10px; border: 1px solid #E2E8F0; border-radius: 8px;">
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Cover Image (Optional)</label>
                        <input type="file" name="image" accept="image/*" style="width: 100%;">
                    </div>
                    <button type="submit" style="width: 100%; background: #00AAFF; color: white; border: none; padding: 12px; border-radius: 10px; font-weight: 700; cursor: pointer;">Save Association</button>
                </form>
            </div>

            <!-- List Table -->
            <div style="background: white; border-radius: 16px; padding: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); overflow-x: auto;">
                <h3 style="margin-bottom: 15px; color: #1e293b;">📋 Existing Associations</h3>
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="border-bottom: 2px solid #EDF2F7; color: #718096; font-size: 14px;">
                            <th>Name</th>
                            <th>Division</th>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($associations as $assoc)
                        <tr style="border-bottom: 1px solid #EDF2F7; font-size: 13px;">
                            <td style="padding: 10px; font-weight: 600;">{{ $assoc->name }}</td>
                            <td style="padding: 10px;">{{ $assoc->division }}</td>
                            <td style="padding: 10px;"><a href="{{ $assoc->link }}" target="_blank" style="color: #00AAFF;">Link</a></td>
                            <td style="padding: 10px;">
                                <form action="{{ route('admin.community.associations.destroy', $assoc) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" style="background: #FC8181; color: white; border: none; padding: 4px 10px; border-radius: 6px; font-size: 12px; cursor: pointer;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4" style="text-align: center; padding: 20px; color: #A0AEC0;">No associations created.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script>
    function switchTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(c => c.style.display = 'none');
        document.querySelectorAll('.tab-btn').forEach(b => {
            b.style.color = '#718096';
            b.style.borderBottomColor = 'transparent';
        });
        document.getElementById(tabId).style.display = 'block';
        
        if (tabId === 'posts-tab') {
            document.getElementById('btn-posts').style.color = '#00AAFF';
            document.getElementById('btn-posts').style.borderBottomColor = '#00AAFF';
        } else {
            document.getElementById('btn-assoc').style.color = '#00AAFF';
            document.getElementById('btn-assoc').style.borderBottomColor = '#00AAFF';
        }
    }
</script>
@endsection
