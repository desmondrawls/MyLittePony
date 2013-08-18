require 'faye'
faye_server = Faye::RackAdapter.new(:mount => '/faye', :timeout => 25)
run faye_server

Faye::WebSocket.load_adapter('thin')