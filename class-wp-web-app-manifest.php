/**
	 * Gets the manifest icons.
	 *
	 * Mainly copied from Jetpack_PWA_Manifest::build_icon_object() and Jetpack_PWA_Helpers::site_icon_url().
	 *
	 * @return array $icon_object An array of icons, which may be empty.
	 */
	public function get_icons() {
		$site_icon_id = get_option( 'site_icon' );
		if ( ! $site_icon_id || ! function_exists( 'get_site_icon_url' ) ) {
			return array();
		}

		$icons     = array();
		$mime_type = get_post_mime_type( $site_icon_id );
		foreach ( $this->default_manifest_icon_sizes as $size ) {
			$icons[] = array(
				'src'   => get_site_icon_url( $size ),
				'sizes' => sprintf( '%1$dx%1$d', $size ),
				'type'  => $mime_type,
			);
		}
		return $icons;
	}