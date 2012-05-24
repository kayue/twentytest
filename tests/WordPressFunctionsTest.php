<?php

class WordPress_Functions_Test extends WordPress_TestCase {

	public function testIsEmail() {
		$this->assertEquals('nb@nikolay.com', is_email('nb@nikolay.com'));
		$this->assertFalse(is_email('nb@nikolay'));
		$this->assertEquals('nb@nikolay.bg', is_email('nb@nikolay.bg'));
	}

	public function testWptexturize() {
		$this->assertEquals( '<code>---</code>', wptexturize( '<code>---</code>' ) );
		$this->assertEquals( '<pre>---</pre>', wptexturize( '<pre>---</pre>' ) );

		$double_nest = '<pre>"baba"<code>"baba"<pre></pre></code>"baba"</pre>';
		$this->assertEquals( $double_nest, wptexturize( $double_nest ) );

		$double_nest = '<code>"baba"<pre>"baba"<code></code></pre>"baba"</code>';
		$this->assertEquals( $double_nest, wptexturize( $double_nest ) );
	}

	public function testQuery() {
		global $wp_query;

		$this->assertEmpty($wp_query->query_vars);
		$this->query(get_permalink(1));
		$this->assertEquals(1, get_the_id());
		$this->assertTrue(is_single(), 'This is not a single post page.');
		$this->assertTrue(have_posts());
		$this->assertFalse(is_404());
	}

	public function testTearDownQuery() {
		global $wp_query;

		$this->assertEmpty($wp_query->query_vars, '$wp_query->query_vars Should have been reset after each test.');
		$this->assertFalse(is_404());
		$this->assertNull(get_the_id());
	}

	public function test404() {
		$this->query(site_url('?p=404'));
		$this->assertTrue(is_404());
	}
}