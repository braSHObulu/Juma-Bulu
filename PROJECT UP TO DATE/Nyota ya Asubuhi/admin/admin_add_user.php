<form action="admin_add_user_process.php" method="POST" style="max-width: 500px; margin: auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 5px;">
    <div style="margin-bottom: 15px;">
        <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Name:</label>
        <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
        <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
    </div>
    
    <div style="margin-bottom: 15px;">
        <label for="role" style="display: block; margin-bottom: 5px; font-weight: bold;">Role:</label>
        <select id="role" name="role" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            <option value="donor">Donor</option>
            <option value="sponsor">Sponsor</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    
    <button type="submit" style="width: 100%; padding: 10px; background-color: #3498db; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">Add User</button>
</form>
