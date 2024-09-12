---
layout: default
title: Home
---

<section class="about">
    <img src="https://via.placeholder.com/100" alt="About This Blog">
    <h2>About This Blog</h2>
    <p>Welcome to <span style="color: orange;">AI Insights Blog</span>, where we explore the <span style="color: orange;">transformative power of AI</span>. Dive into <span style="color: orange;">insightful content</span> on the latest advancements, ethical considerations, and industry trends in AI. Stay informed and ahead of the curve!</p>
</section>

<section class="posts">
    <h2>Recent Posts</h2>
    <div class="post-grid">
        {% if site.posts.size > 0 %}
            {% for post in site.posts limit:3 %}
            <div class="post">
                <h3>{{ post.title }}</h3>
                <p>{{ post.excerpt }}</p>
                <a href="{{ post.url }}">Read More</a>
            </div>
            {% endfor %}
        {% else %}
            <p>No posts available.</p>
        {% endif %}
    </div>
</section>

<section class="newsletter">
    <h2>Subscribe to Our Newsletter</h2>
    <p>Get the latest AI news and updates delivered straight to your inbox.</p>
    <form action="#">
        <input type="email" placeholder="Enter your email">
        <button type="submit">Subscribe</button>
    </form>
</section>

<footer>
    <p>&copy; 2024 AI Insights Blog. All Rights Reserved.</p>
    <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    <p>Follow us on 
        <a href="#">Twitter</a>, 
        <a href="#">LinkedIn</a>, 
        <a href="#">Facebook</a>
    </p>
</footer>
