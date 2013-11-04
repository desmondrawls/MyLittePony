class WriteToChat
  def self.push_message(content, heroine, outgoing)
    uri = URI.parse("http://162.243.70.202:9292/faye")
    data = {:content => content, :heroine => heroine, :outgoing => outgoing}
    message = {:channel => "/receive", :data => data}
    Net::HTTP.post_form(uri, :message => message.to_json)
  end
end



