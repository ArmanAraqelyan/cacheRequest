public function cacheRequest($id) {
    $this->load->driver('cache', ['adapter' => 'apc', 'backup' => 'file']);

    if ($this->cache->get($id)) {
        return $this->cache->get($id);
    }
    $request = $this->db->select('*')->where('id', $id)->get('tags')->result_array();
    $this->cache->save($id, $request, 300);
    return $request;
}